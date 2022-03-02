<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plate;
use App\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();
        return view('admin.home', compact('user', 'plates'));
    }
}