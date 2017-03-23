<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master_applycategory extends Model
{
    protected $table = 'master_applycategory';
    public function master_apply() {
        return $this->belongsTo('App\Masterapplies');
    }
}
