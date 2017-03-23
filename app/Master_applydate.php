<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applydate extends Model
{
    protected $table = 'master_applydate';
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
