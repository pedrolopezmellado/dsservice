<?php

namespace App\Repositories;

use App\Purchase;
use App\User;
use App\Service;
use App\Category;

class PurchaseRepository {
    
    //Encontrar listado de compras
    public static function find($id){
        return Purchase::find($id);
    }

    public static function findPurchase($purchase){
        return Purchase::find($purchase);
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
        return Purchase::where('user_id', '=', $id)->where('accepted','!=','rejected')->paginate(3);
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

  
/*
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
*/
    public static function valor($valor,$id){
        $purchase = Purchase::findOrFail($id);
        $purchase->valoration = $valor;
        $purchase->update();
    }

    public static function comentario($comentario,$id){
        $purchase = Purchase::findOrFail($id);
        $purchase->comentario = $comentario;
        $purchase->update();
    }

    public static function delete($id){
        Purchase::findOrFail($id)->delete();
    }

    public static function tipoPurchases($id, $orden){
        $compras = Purchase::where('user_id', '=', $id);

        if($orden == "SinOrden"){
            return $compras->paginate(3);
        }else if($orden == "Inproccess"){
            return Purchase::where('user_id', '=', $id)->where('accepted', '=', 'inprocess')->paginate(3);
        }else if($orden == "Accepted"){
            return Purchase::where('user_id', '=', $id)->where('accepted', '=', 'accepted')->paginate(3);
        }else if($orden == "Precio ↑"){
            return $compras->orderBy('amount', 'asc')->paginate(3);
        }else if($orden == "Precio ↓"){
            return $compras->orderBy('amount', 'desc')->paginate(3);     
        }else if($orden == "Nombre ↓"){
            return Purchase::join('services', 'services.id', '=', 'purchases.service_id')
            ->where('purchases.user_id', '=', $id)->orderBy('services.name','desc')->paginate(3);
        }
        else if($orden == "Nombre ↑"){
            return Purchase::join('services', 'services.id', '=', 'purchases.service_id')
            ->where('purchases.user_id', '=', $id)->orderBy('services.name','asc')->paginate(3);
        }
    }
    
    public static function getValues($id){
        return Purchase::where('service_id', '=', $id)->where('valoration','>','0')->avg('valoration');
    }

    public static function getComentarios($id){
        return Purchase::where('service_id', '=', $id)->where('comentario','!=','')->get('comentario');
    }

    public static function purchasesInProcess($user){
        return Purchase::join('services', 'services.id', '=', 'purchases.service_id')
        ->where('services.user_id', '=', $user)->where('purchases.accepted','=','inprocess')->get() ;
    }
    public static function resolve($resolucion,$purchase){
        $newpurchase = Purchase::find($purchase);
        $newpurchase->accepted = $resolucion;
        $newpurchase->save();
    }
 

}