<?php

namespace App\Events;

use App\Models\Blog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlogCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blog;
    public $category;
    public $tags;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Blog $blog, $category, $tags)
    {
        $this->blog = $blog;
        $this->category = $category;
        $this->tags = $tags;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
