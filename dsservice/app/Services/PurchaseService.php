<?php

namespace App\Services;

use App\Repositories\PurchaseRepository;

class PurchaseService {
    
    public static function new($user, $service, $account,$amount, $description){
        return PurchaseRepository::new($user, $service, $account,$amount, $description);
    }

    public static function find($user_id){
        return PurchaseRepository::find($user_id); 
    }

    public static function delete($id){
        return PurchaseRepository::delete($id);
    }

    public static function paginate($n){
        return PurchaseRepository::paginate($n);
    }

    public static function listByUser($id){
        return PurchaseRepository::listByUser($id);        
    }

    public static function ordenar($id, $orden){
        return PurchaseRepository::ordenar($id, $orden);        
    }

    public static function valor($new,$id){
        return PurchaseRepository::valor($new,$id);        
    }

    public static function comentario($new,$id){
        return PurchaseRepository::comentario($new,$id);        
    }

    public static function tipoPurchases($id, $orden){
        return PurchaseRepository::tipoPurchases($id, $orden);        
    }

    public static function getValues($id){
        return PurchaseRepository::getValues($id);        
    }

    public static function getComentarios($id){
        return PurchaseRepository::getComentarios($id);        
    }
}
