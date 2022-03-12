<?php

namespace App\Listeners;

use App\Events\AcceptanceOrder;
use App\Events\AcceptancePayment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class MakeInvoiceSubsciber
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

        if(Storage::exists($order->invoice)){
            Storage::delete($order->invoice);
        };

        $order->invoice = null;
        
        if($order->acceptance == 1){
            $pdf = Pdf::loadView('pdf.invoice', compact('order'));
            $pdf->setPaper('A4', 'portrait');
            $invoice = 'customers/invoices/' . $order->order_id . '_' . $order->token . '.pdf';
            // $pdf->save(storage_path('app/'. $invoice));
            $content = $pdf->download()->getOriginalContent();
            Storage::put($invoice, $content);

            $order->invoice = $invoice;
        }

        $order->save();
    }

    public function handleAcceptancePayment($event)
    {
        $order = $event->order;

        if(Storage::exists($order->invoice)){
            Storage::delete($order->invoice);
        };

        $order->invoice = null;
        
        if($order->payment == 1){
            $pdf = Pdf::loadView('pdf.invoice', compact('order'));
            $pdf->setPaper('A4', 'portrait');
            $invoice = 'customers/invoices/' . $order->order_id . '_' . $order->token . '.pdf';
            // $pdf->save(storage_path('app/'. $invoice));
            $content = $pdf->download()->getOriginalContent();
            Storage::put($invoice, $content);

            $order->invoice = $invoice;
        }

        $order->save();
    }

    public function subscribe($event)
    {
        return [
            AcceptanceOrder::class => 'handleAcceptanceOrder',
            AcceptancePayment::class => 'handleAcceptancePayment',
        ];
    }
}
