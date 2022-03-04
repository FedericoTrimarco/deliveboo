<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Typology;
use App\User;
use App\Restaurant;

class TypologyController extends Controller
{
    public function index() {
        $typologies = Typology::all();
        return response()->json($typologies);
    }

    public function show($id) {
        
        $restaurants = User::join('restaurants', 'user_id', '=', 'users.id')
                ->join('restaurant_typology', 'restaurant_id', '=', 'restaurants.id')
                ->where('restaurant_typology.typology_id', '=', $id)
                ->select('users.name', 'users.address', 'users.email', 'restaurants.cover','restaurant_typology.typology_id')
                ->get();
                
        
        return response()->json($restaurants);
    }
}
