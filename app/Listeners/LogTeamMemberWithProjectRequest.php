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
        //TeamMemberLog::create(['name' => $event->teamMember->name, 'title'=> $event->teamMember->title, 'picture' => $event->teamMember->picture, 'email' => $event->teamMember->email, 'phone_number' => $event->teamMember->phonenumber, 'background-information' => $event->teamMemmber->background_information, 'project_request_id' =>$event->teamMemmber->project_request_id,'type' => $event->teamMember->type ]);
        TeamMemberLog::insert($event->teamMember);
        //dd($event->teamMember);
    }
}
