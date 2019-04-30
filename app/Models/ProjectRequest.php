<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $table = 'project_requests';
    protected $fillable = ['project_title', 'client_id'];

     // Relations
     public function teamMember() {
        return $this->hasMany('\App\Models\TeamMember', 'project_request_id', 'id');
    }
    public function teamMemberLog() {
        return $this->hasMany('\App\Models\TeamMemberLog', 'project_request_id', 'id');
    }
}




