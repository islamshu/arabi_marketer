<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Str;
class NewUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $name;
    public $title;
    public $time;
    public $url;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->title = $data['title'];
        $this->url = $data['url'];
        $this->time = $data['time'];

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
      return new Channel('pusher_internal:subscription_succeeded');
        // return['new-user'];
    }
}
