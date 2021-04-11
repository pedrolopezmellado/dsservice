<?php

namespace App\Services;

use App\Repositories\PurchaseRepository;

class PurchaseService {
    
    public static function new($user, $service, $account,$amount, $description){
        return PurchaseRepository::new($user, $service, $account,$amount, $description);
    }

}
