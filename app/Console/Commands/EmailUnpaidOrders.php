<?php

namespace App\Console\Commands;

use App\Mail\UnpaidOrder;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailUnpaidOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:unpaid-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to unpaid orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::get();
        
        $orders->where('payment_due', '<', Carbon::today())->each(function($order) {
            if($order->payment != 1){
                Mail::to($order->email)->send(new UnpaidOrder($order));
                $order->delete();
            }
        });
    }
}
