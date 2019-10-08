<?php

namespace App\Events;

use App\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;
    public $type;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post['post'];
        $this->type = $post['type'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('post');
    }

    public function broadcastWith()
    {
        return [
            "post" => $this->post,
            "type" => $this->type,
        ];
    }
}
