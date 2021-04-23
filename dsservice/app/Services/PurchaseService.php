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
}
