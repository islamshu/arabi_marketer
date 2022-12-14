<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

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
        return new PrivateChannel('new-user');
    }
}
