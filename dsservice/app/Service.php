<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }
}
