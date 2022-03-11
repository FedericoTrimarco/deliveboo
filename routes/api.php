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

Route::namespace('Api')->group(function () {
    // Typologies get api route
    Route::get('/typologies', 'TypologyController@index');
    // Restaurant get api route
    Route::get('/restaurants', 'RestaurantController@index');

    //typologie_restaurant
    Route::get('/typologies/{id}', 'TypologyController@show');

    //category-plates
    Route::get('/categories', 'CategoryController@index');

    Route::post('/restaurant/menu', 'RestaurantController@getMenu');
    Route::post('/send_email', 'RestaurantController@send_email');
    
    
    Route::get('/get_token', 'OrderController@get_token');
    Route::post('/cart_validation', 'OrderController@cart_validation');
    Route::post('/make_payment', 'OrderController@make_payment');
    Route::post('/store', 'OrderController@store');
});