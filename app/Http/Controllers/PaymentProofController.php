<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentProofController extends Controller
{
    public function paymentProof($order_id, $token)
    {
        $order = Order::where('order_id', $order_id)->where('token', $token)->first();
        return view('web.user.payment_proof.index');
    }
}
