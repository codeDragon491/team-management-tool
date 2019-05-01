<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMemberLog extends Model
{
    //
    protected $table = 'team_members_log';
    protected $fillable = ['name', 'title', 'picture', 'email', 'phone_number', 'background_information', 'project_request_id', 'type'];
}