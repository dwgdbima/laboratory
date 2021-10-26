<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SyncTagBlogCreated
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
        $tags = array();
        foreach ($event->tags as $tag) {
            $tags[] = Tag::firstOrCreate(
                ['name' => $tag],
                ['slug' => $tag]
            )->id;
        }

        $event->blog->tags()->sync($tags);
    }
}
