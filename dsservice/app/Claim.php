<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    public function purchase(){
        return $this->belongsTo('App\Purchase', 'purchase_id', 'id');
    }

    
    // public function administrator(){
    //     return $this->belongsTo('App\Administrator','administrator_id','email');
    // }
    
}
