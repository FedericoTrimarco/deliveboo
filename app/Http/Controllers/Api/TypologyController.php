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
                ->join('typologies', 'typologies.id', '=', 'restaurant_typology.typology_id')
                ->where('restaurant_typology.typology_id', '=', $id)
                ->select('users.name', 'users.address', 'users.email', 'restaurants.cover', 'restaurants.id AS restaurant_id','restaurant_typology.typology_id', 'typologies.name AS name_typology')
                ->get();
        
        foreach ($restaurants as $restaurant) {
            $restaurant->cover = url('storage/' . $restaurant->cover);
        }
        
        return response()->json($restaurants);
    }
}
