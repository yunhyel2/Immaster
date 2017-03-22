<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth_user extends Model
{
    protected $table = 'auth_user';

    public function user_profiles() {
        return $this->hasMany('App\Server_userprofile');
    }
}
