<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Events\AcceptanceOrder;
use App\Events\AcceptancePayment;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:super-admin');
        $this->addMenuData('Pesanan', route('admin.orders.index'));
    }

    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('web.admin.order.index');
    }

    public function show(Order $order)
    {
        return response()->json($order->load(['service.unit', 'customerStatus']));
    }

    public function acceptance(Request $request, Order $order)
    {
        $order->token =  uniqid($order->order_id);
        $reason = null;
        
        if($order->service->unit->slug == 'per-hari'){
            $order->payment_due = Carbon::today()->eq(Carbon::parse($order->start_date)) ? Carbon::today()->endOfDay() : Carbon::today()->addDay()->endOfDay();
        }else{
            $order->payment_due = Carbon::today()->eq(Carbon::parse($order->date)) ? Carbon::today()->endOfDay() : Carbon::today()->addDay()->endOfDay();
        }

        if($request->acceptance == 2){
            $reason = $request->reason;
            $order->token = null;
        }

        $order->acceptance = $request->acceptance;
        $order->save();

        $data = event(new AcceptanceOrder($order, $reason));

        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function payment(Request $request, Order $order)
    {
        $reason = null;

        if($request->payment == 0){

            if(Storage::exists($order->payment_proof)){
                Storage::delete($order->payment_proof);
            }
            
            $reason = $request->reason;
            $order->payment_proof = null;
        }
        
        $order->payment = $request->payment;
        $order->save();

        event(new AcceptancePayment($order, $reason));

        return response()->json(['status' => 'success', 'message' => 'sucsess']);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json('success');
    }
}