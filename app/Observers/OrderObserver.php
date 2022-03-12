<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        // Order ID
        $order_id = Str::padLeft($order->id, 4, '0');
        $order->order_id = $order_id;

        $price = Service::find($order->service_id)->servicePrices()->where('customer_status_id', $order->customer_status_id)->first()->price;

        if(request()->unit == 'per-hari'){
            $startDate = Carbon::parse($order->start_date);
            $endDate = Carbon::parse($order->end_date);

            $length = $endDate->diffInDays($startDate) + 1;

            $order->price = $price * $length;
        }else{
            $order->price = $price * intval($order->quantity);
        }
        $order->save();
    }

    public function deleting(Order $order)
    {
        Storage::exists($order->identity_card) ? Storage::delete($order->identity_card) : null ;
        Storage::exists($order->payment_proof) ? Storage::delete($order->payment_proof) : null ;
        Storage::exists($order->invoice) ? Storage::delete($order->invoice) : null ;
    }
}
