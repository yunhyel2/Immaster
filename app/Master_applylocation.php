<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applylocation extends Model
{
    protected $table = 'master_applylocation';
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
