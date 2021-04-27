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
        return Purchase::where('user_id', '=', $id)->paginate(3);
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

    public static function ordenar($id, $orden){
        $compras = Purchase::where('user_id', '=', $id);

        if($orden == "SinOrden"){
            return $compras->paginate(3);
        }else if($orden == "Precio ↑"){
            return $compras->orderBy('amount', 'asc')->paginate(3);
        }else if($orden == "Precio ↓"){
            return $compras->orderBy('amount', 'desc')->paginate(3);
        }   
       
    }
       

    public static function valor($valor,$id){
        $purchase = Purchase::findOrFail($id);
        $purchase->valoration = $valor;
        $purchase->update();
    }

    public static function tipoPurchases($id, $orden){
        $compras = Purchase::where('user_id', '=', $id);

        if($orden == "SinOrden"){
            return $compras->paginate(3);
        }else if($orden == "Inproccess"){
            return Purchase::where('user_id', '=', $id)->where('accepted', '=', 'inprocess')->paginate(3);
        }else if($orden == "Accepted"){
            return Purchase::where('user_id', '=', $id)->where('accepted', '=', 'accepted')->paginate(3);
        }   
       
    }

}