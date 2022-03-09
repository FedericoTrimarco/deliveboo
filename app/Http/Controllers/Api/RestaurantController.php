<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use App\Mail\SendNewMailToRestaurant;
use App\Plate;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Typology;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::with(['user', 'typologies'])->select('restaurants.id', 'restaurants.cover', 'restaurants.user_id')->get();
        
        foreach ($restaurants as $restaurant) {
            $restaurant->cover = url('storage/' . $restaurant->cover);
        }
        return response()->json($restaurants);
    }

    // public function getRestaurantsByTipology ($array) {
    //     foreach ($array as $id) {
    //         $restaurants = Typology::find($id)->restaurants()->get();
    //     }
        
    //     return response()->json($restaurants);
    // }

    public function getMenu(Request $request) {
        $data = $request->all();
        $id = (int)$data['id'];
        $plates = Restaurant::find($id)->plates()->get();
        return response()->json($plates);
    }

    public function send_email(Request $request) {
        $data = $request->all();
        $name = $data['email'];
        $restaurant_name = User::find($data['id'])->name;
        $restaurant_email = User::find($data['id'])->email;


        Mail::to($name)->send(new SendNewMail($name));
        Mail::to($restaurant_email)->send(new SendNewMailToRestaurant($restaurant_name));
        return $restaurant_name;
    }
}