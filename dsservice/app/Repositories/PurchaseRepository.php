<?php

namespace App\Repositories;

use App\Purchase;

class PurchaseRepository {
    
    //Encontrar una compra por su ID
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
    //Crear una compra
    public static function new($user, $service, $account, $amount, $description){
        $purchase = new Purchase();
        $purchase->account = $account;
        $purchase->amount = $amount;
        $purchase->accepted = 'inprocess';
        $purchase->description = $description;
        $purchase->user_id = $user;
        $purchase->service_id = $service;
        $purchase->save();
    }

    //No estoy seguro del delete (todavía)
    public static function delete($id){
        Purchase::where($id, $purchase->id)->delete();
    }
}
