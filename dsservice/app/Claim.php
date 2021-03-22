<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'email');
    }

    public function service(){
        return $this->belongsTo('App\Service','service_id','id');
    }

    
    public function administrator(){
        return $this->belongsTo('App\Administrator','administrator_id','email');
    }
    
}
