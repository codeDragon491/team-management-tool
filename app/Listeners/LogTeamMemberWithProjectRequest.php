<?php

namespace App\Listeners;

use App\Models\TeamMemberLog;
use App\Events\TeamMemberUpdating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogTeamMemberWithProjectRequest
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
     * @param  TeamMemberUpdating  $event
     * @return void
     */
    public function handle(TeamMemberUpdating $event)

    {   
        TeamMemberLog::insert($event->teamMembers);
        //dd($event->teamMembers);
    }
}
