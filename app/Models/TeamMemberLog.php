<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMemberLog extends Model
{
    //
    protected $table = 'team_members_log';
    protected $fillable = ['name', 'title', 'email', 'phone_number', 'background_information', 'created_at', 'updated_at','project_request_id'];
}