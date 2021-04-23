<?php

namespace App\Repositories;

use App\Claim;

class ClaimRepository {
    
    public static function find($id){
        return Claim::find($id);
    }

    public static function new($motive, $purchase){
        $claim = new Claim();
        $claim->motive = $motive;
        $claim->status = 'inprocess';
        $claim->purchase_id = $purchase;
        $claim->save();
    }

    public static function all(){
        return Claim::all(); 
    }

    public static function delete($id){
        Claim::where("id", "=" , $id)->delete();
    }
 
}
