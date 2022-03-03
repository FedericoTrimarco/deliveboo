<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = User::join('restaurants', 'user_id', '=', 'restaurants.user_id')->select('users.name', 'users.address', 'users.email', 'restaurants.cover')->get();
        return response()->json($restaurants);
    }
}
