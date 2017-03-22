<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applylocation extends Model
{
    protected $table = 'applylocation';
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
