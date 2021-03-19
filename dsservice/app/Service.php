<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'email');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase', 'service_id', 'id');
    }

    public function claims(){
        return $this->hasMany('App\Claim','service_id','id');
    }
}
