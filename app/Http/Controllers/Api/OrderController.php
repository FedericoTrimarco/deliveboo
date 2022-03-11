<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Order;
use App\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function get_token(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = ['token' => $token];
        return response()->json($data, 200);
    }

    public function make_payment(OrderRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => ['submitForSettlement' => false]
        ]);

        if ($result->success) {
            $data = ['success' => true, 'message' => 'transazione eseguita con successo'];
            return response()->json($data, 200);
        } else {
            $data = ['success' => false, 'message' => 'transazione fallita'];
            return response()->json($data, 401);
        }
    }

    public function cart_validation(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'plates' => 'present|array',
            'plates.*.id' => 'required|integer|exists:plates,id',
        ], [
            'exists' => 'Il piatto selezionato non esiste'
        ]);

        $amount = 0;
        $valid = true;

        if ($validator->fails()) {
            $valid = false;
            return response()->json(['error' => $validator->errors(), 'valid' => $valid]);
        }

        $data = $request->all();
        foreach ($data['plates'] as $plate) {
            $amount += Plate::find($plate['id'])->price * $plate['quantity'];
        }

        return response()->json(['valid' => $valid, 'amount' => $amount]);
    }

    public function store(Request $request)
    {
        $amount= 0;
        $order = new Order();
        $data = $request->all();

        foreach ($data['plates'] as $plate) {
            $amount += Plate::find($plate['id'])->price * $plate['quantity'];
        }

        $order->restaurant_id = $data['id'];
        $order->status = 'ok';
        $order->tot = $amount;

        $order->save();

        if (array_key_exists('plates', $data)) {
            foreach ($data['plates'] as $plate) {
                $order->plates()->attach($plate['id'], ['quantity' => $plate['quantity']]);
            }
        }

        return response()->json(['message' => 'grazie per i tuoi acquisti']);
    }
}