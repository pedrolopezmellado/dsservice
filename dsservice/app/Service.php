<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'email');
    }

    public function purchase(){
        return $this->hasMany('App\Purchase');
    }
}
