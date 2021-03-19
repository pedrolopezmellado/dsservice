<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function services(){
        return $this->hasMany('App\Service', 'user_id', 'email');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }

    public function claims(){
        return $this->hasMany('App\Claim','user_id','email');
    }
}
