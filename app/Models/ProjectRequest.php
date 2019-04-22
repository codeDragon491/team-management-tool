<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    protected $table = 'project_requests';
    protected $fillable = ['project_title', 'project_description', 'client_id'];

     // Relations
     public function TeamMember() {
        return $this->hasMany('\App\Models\TeamMember', 'project_request_id', 'id');
    }
}




