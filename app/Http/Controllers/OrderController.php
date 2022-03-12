<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $request->validated();

        $file = $request->file('identity_card');
        $name = date('dmY') . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('customers/identity_card', $name);

        $request = new Request($request->all());
        $request->merge(['identity_card' => $path]);

        Order::create($request->all());

        Alert::success('Pemesanan Berhasil', 'Mohon menunggu persetujuan oleh admin. Pemberitahuan akan dikirim ke email yang dicantumkan.')->autoClose(false);
        return redirect()->back();
    }

    public function getAll($id)
    {
        $orders = Order::where('service_id', $id)->get();

        return response()->json($orders);
    }

    public function paymentProof($order_id, $token)
    {
        return view('web.user.payment_proof.index', compact('order_id', 'token'));
    }

    public function storePaymentProof(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->where('token', $request->token)->first();
        if($order == null){
            Alert::error('Submit Bukti Pembayaran Gagal', 'ID Pemesanan dan Token Tidak Cocok.')->autoClose(false);
            return redirect()->back();
        }

        $file = $request->file('payment_proof');
        $name = date('dmY') . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('customers/payment_proof', $name);

        $order->payment_proof = $path;
        $order->payment = 2;
        $order->save();

        Alert::success('Submit Bukti Pembayaran Berhasil', 'Mohon menunggu verifikasi pembayaran oleh admin. Pemberitahuan akan dikirim ke email yang dicantumkan.')->autoClose(false);
        return redirect()->route('service');
    }
}
