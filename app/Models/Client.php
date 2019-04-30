<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

       // Relations
       public function projectRequest() {
       return $this->hasMany('\App\Models\ProjectRequest', 'client_id', 'id');
    }
}
