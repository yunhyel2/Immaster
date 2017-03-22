<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server_userprofile extends Model
{
    public function user() {
        return $this->belongsTo('App\Auth_user');
    }
}
