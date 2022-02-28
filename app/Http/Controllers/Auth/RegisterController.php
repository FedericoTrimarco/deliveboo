<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Restaurant;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:10', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/', 'confirmed'],
            'password_confirmation' => ['confirmed'],
            'address' => ['required', 'string', 'max:100'],
            'vat_number' => ['required', 'numeric', 'max:11'],
            'cover' => ['nullable', 'file', 'mimes:jpeg,png,jpg'],
        ], [
            'name.required' => 'Questo campo è obbligatorio',
            'email.required' => 'Questo campo è obbligatorio',
            'password.required' => 'Questo è un campo obbligatorio',
            'password.min' => 'La password deve contenere almeno 10 caratteri',
            'password.regex' => 'Inserisci almeno una maiuscola, un numero e un carattere speciale',
            'password.confirmed' => 'Le password inserite non sono uguali',
            'address.required' => 'Questo campo è obbligatorio',
            'vat_number.required' => 'Questo campo è obbligatorio',
            'vat_number.numeric' => 'Questo campo non può contenere lettere',
            'vat_number.max' => 'Questo campo deve contentere 11 caratteri',
            'cover' => ['nullable', 'file', 'mimes:jpeg,png,jpg'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
        ]);


        $user->save();
        $user_id = $user->id;

        $restaurant = Restaurant::create([
            'vat_number' => $data['vat_number'],
            'cover' => Storage::put('uploads/', $data['cover']),
            'user_id' => $user_id,
        ]);

        $restaurant->save();

        return $user;
    }
}