<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::with(['user', 'typologies'])->select('restaurants.id', 'restaurants.cover', 'restaurants.user_id')->get();
        
        foreach ($restaurants as $restaurant) {
            $restaurant->cover = url('storage/' . $restaurant->cover);
        }
        return response()->json($restaurants);
    }
}