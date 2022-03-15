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
        // $orders = Order::where('restaurant_id', Auth::user()->id)->get();

        // $orders = Order::find(1)->plates();
        // $opi = $orders[0]->pivot->quantity;
        // foreach($platform->users as $user) { echo "username: $user->username , pivot value: $user->pivot->some_value"; }

        $data = [];
        $orders = Order::with('plates')->where('restaurant_id', Auth::user()->id)->get();

        foreach ($orders as $index => $plate) {
            $p = $plate;
            array_push($data, [
                'id' => $p->id,
                'tot' => $p->tot,
                'status' => $p->status
            ]);
        }

        $title = 'Ordini';
        $id = Auth::user()->id;
        $categories = Category::all();
        $user = User::where('id', $id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders', 'title', 'user', 'categories', 'restaurant', 'plates', 'data'));
    }
}
