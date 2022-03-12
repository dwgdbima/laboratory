<?php

namespace App\Providers;

use App\Events\BlogCreated;
use App\Events\AcceptanceOrder;
use App\Listeners\MakeInvoice;
use App\Listeners\MakeInvoiceSubsciber;
use App\Listeners\SendEmailAcceptanceSubscriber;
use App\Listeners\SyncCategoryBlogCreated;
use App\Listeners\SyncTagBlogCreated;
use App\Models\Blog;
use App\Models\Order;
use App\Observers\BlogObserver;
use App\Observers\OrderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        BlogCreated::class => [
            SyncCategoryBlogCreated::class,
            SyncTagBlogCreated::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        MakeInvoiceSubsciber::class,
        SendEmailAcceptanceSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(BlogObserver::class);
        Order::observe(OrderObserver::class);
    }
}
