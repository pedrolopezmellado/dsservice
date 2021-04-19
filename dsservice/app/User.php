<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract 
{
    use Authenticatable;

    public function services(){
        return $this->hasMany('App\Service', 'user_id', 'email');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase');
    }

}
