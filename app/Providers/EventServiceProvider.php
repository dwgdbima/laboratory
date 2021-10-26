<?php

namespace App\Providers;

use App\Events\BlogCreated;
use App\Listeners\SyncCategoryBlogCreated;
use App\Listeners\SyncTagBlogCreated;
use App\Models\Blog;
use App\Observers\BlogObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(BlogObserver::class);
    }
}
