<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function checkout(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'plates' => 'present|array',
            'plates.*.id' => 'required|integer|exists:plates,id',
        ], [
            'exists' => 'Il piatto selezionato non esiste'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $data = $request->all();
        $amount = 0;
        foreach ($data['plates'] as $plate) {
           $amount += Plate::find($plate['id'])->price * $plate['quantity'];
        }
        $order = new Order();

        $order->restaurant_id = $data['id'];
        $order->status = 'ok';
        $order->tot = $amount;

        $order->save();

        // if (array_key_exists('plates', $data)) {
        //     $order->plates->attach($data['plates']);
        // }

        return $amount;
    }
}