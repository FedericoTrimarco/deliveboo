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
    public function index() {
        $orders = Order::where('restaurant_id', Auth::user()->id )->get();
        $plates = [];
        $table = [];

        foreach ($orders as $order) {
            // array_push($plates, $order->plates->id);

            $t;
            $t['id'] = $order->id;
            $t['total'] = $order->tot;
            // $t['quantity'] = $order->plates->pivot->id;

            array_push($table, $t);
        }
        dd($table);

        $title = 'Piatti';
        $id = Auth::user()->id;
        $categories = Category::all();
        $user = User::where('id', $id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders', 'title', 'user', 'categories', 'restaurant', 'plates'));
    }
}
