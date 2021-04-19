<?php

namespace App\Services;

use App\Repositories\ClaimRepository;

class ClaimService {
    
    public static function new($motive, $purchase){
        return ClaimRepository::new($motive, $purchase);
    }

    public static function all(){
        return ClaimRepository::all(); 
    }

}
