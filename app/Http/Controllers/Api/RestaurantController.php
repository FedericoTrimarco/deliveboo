<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = User::join('restaurants', 'users.id', '=', 'restaurants.user_id')->select('restaurants.id','users.name', 'users.address', 'users.email', 'restaurants.cover')->get();
        return response()->json($restaurants);
    }
}