<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function service(){
        return $this->hasMany('App\Service');
    }

    public function purchase(){
        return $this->hasMany('App\Purchase');
    }
}
