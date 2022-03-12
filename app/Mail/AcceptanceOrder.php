<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptanceOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $reason;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $reason = null)
    {
        $this->order = $order;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->order->acceptance == 1){
            return $this->subject('Email Persetujuan Pesanan')
                ->view('emails.order.accept')
                ->attachFromStorage($this->order->invoice);
        }

        return $this->subject('Email Persetujuan Pesanan')
                ->view('emails.order.decline');
    }
}
