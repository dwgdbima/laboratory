<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use App\Models\Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncCategoryBlogCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BlogCreated  $event
     * @return void
     */
    public function handle(BlogCreated $event)
    {
        $category = Category::firstOrCreate(
            ['name' => $event->category],
            ['slug' => $event->category]
        )->id;

        $event->blog->categories()->sync($category);
    }
}
