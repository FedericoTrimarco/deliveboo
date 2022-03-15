<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::get('/registers', 'Auth\AuthController@getTypologies')->name('registers');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/plates', 'PlateController');
        Route::resource('/orders', 'OrderController');
        Route::resource('/statistics', 'StatisticController');
    });

Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*');
