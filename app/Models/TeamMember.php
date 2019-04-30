<?php

namespace App\Models;

use App\Events\TeamMemberUpdating;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use Notifiable; 
    //
    protected $table = 'team_members';
    protected $fillable = ['project_request_id'];

    protected $dispatchesEvents = [
        'updating' => TeamMemberUpdating::class,
    ];
}