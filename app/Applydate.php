<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applydate extends Model
{
    protected $table = 'applydate';
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
