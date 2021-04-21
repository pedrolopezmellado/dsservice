<?php

namespace App\Repositories;

use App\Purchase;
use App\User;
use App\Service;

class PurchaseRepository {
    
    //Encontrar listado de compras
    public static function find($id){
        return Purchase::find($id);
    }

    //Mostrar todos
    public static function all(){
        return Purchase::all(); 
    }
    
    //Mostrar todos de un usuario ?
    /* 
    public static function allUser($user_id){
        return Purchase::allUser($user_id); 
    }
    */

    public static function paginate($n){
        return Service::paginate($n);
    }

    public static function listByUser($id){
        return Purchase::where('user_id', '=', $id)->paginate(6);
    }

    //Crear una compra
    public static function new($user, $service, $account, $amount, $description){
        $purchase = new Purchase();
        $purchase->account = $account;
        $purchase->amount = $amount;
        $purchase->accepted = 'inprocess';
        $purchase->description = $description;
        $user_id = User::find($user);
        $service_id = Service::find($service);
        $purchase->user()->associate($user_id);
        $purchase->service()->associate($service_id);
        $purchase->save();
    }

    //No estoy seguro del delete (todavía)
    public static function delete($id){
        Purchase::findOrFail($id)->delete();
    }
}
