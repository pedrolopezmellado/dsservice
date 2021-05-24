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

    public static function listByUser($email){
        return Claim::join('purchases', 'purchases.id', '=', 'claims.purchase_id')->where('purchases.user_id', '=', $email)->paginate(4);
    }

    public static function listInProcess(){
        return Claim::where('status', '=', 'inprocess')->get();
    }

    public static function resolve($resolucion, $disputa, $comentario){
        $newdisputa = Claim::find($disputa);
        $newdisputa->status = $resolucion;
        $newdisputa->resolve = $comentario;
        $newdisputa->save();
    }
 
}
