<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract 
{
    public $incrementing=false;
    protected $primaryKey = 'email';
    protected $fillable = ['email'];
    use Authenticatable;

    public function services(){
        return $this->hasMany('App\Service', 'user_id', 'email');
    }

    public function purchases(){
        return $this->hasMany('App\Purchase','user_id','email');
    }

    public static function currentUser(){
        return User::find("dario@gmail.com");
    }

}
