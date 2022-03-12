<?php

namespace App\Listeners;

use App\Events\AcceptanceOrder;
use App\Events\AcceptancePayment;
use App\Mail\AcceptanceOrder as MailAcceptanceOrder;
use App\Mail\AcceptancePayment as MailAcceptancePayment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendEmailAcceptanceSubscriber
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handleAcceptanceOrder($event)
    {
        $order = $event->order;
        Mail::to($order->email)->send(new MailAcceptanceOrder($order, $event->reason));
        if($order->acceptance == 2){
            $order->delete();
        }
    }

    public function handleAcceptancePayment($event)
    {
        $order = $event->order;
        Mail::to($order->email)->send(new MailAcceptancePayment($order, $event->reason));
    }

    public function subscribe($event)
    {
        return [
            AcceptanceOrder::class => 'handleAcceptanceOrder',
            AcceptancePayment::class => 'handleAcceptancePayment',
        ];
    }
}
