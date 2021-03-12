<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'email');
    }

    public function service(){
        return $this->belongsTo('App\Service', 'service_id','id');
    }
    
}
