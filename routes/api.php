<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function() {
    // Typologies get api route
    Route::get('/typologies', 'TypologyController@index');
    // Restaurant get api route
    Route::get('/restaurants', 'RestaurantController@index');
    
    //typologie_restaurant
    Route::get('/typologies/{id}', 'TypologyController@show');

    Route::post('/restaurant/menu', 'RestaurantController@getMenu');
    Route::post('/checkout', 'OrderController@checkout');
});