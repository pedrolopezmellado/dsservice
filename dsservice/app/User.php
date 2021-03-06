<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function purchase(){
        return $this->hasMany('App\Service');
    }
}
