<?php

namespace App\Observers;

use App\Models\Blog;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
        $blog->slug = $blog->title;
    }

    public function updating(Blog $blog)
    {
        $blog->slug = $blog->title;
    }
}
