<?php

namespace App\Http\Controllers\Admin;

use App\Plate;
use App\Typology;
use App\Category;
use App\User;
use App\Order;
use App\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('restaurant_id', Auth::user()->id)->get();

        dd($orders);

        $title = 'Piatti';
        $id = Auth::user()->id;
        $categories = Category::all();
        $user = User::where('id', $id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders', 'title', 'user', 'categories', 'restaurant', 'plates'));
    }
}
