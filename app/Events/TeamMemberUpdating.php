<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\TeamMember;

class TeamMemberUpdating extends Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $teamMember;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamMember $teamMember)
    {
        $this->teamMember = $teamMember;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }*/
}
