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

    public static function delete($id){
        return ClaimRepository::delete($id);
    }

    public static function listByUser($email){
        return ClaimRepository::listByUser($email);
    }

    public static function listInProcess(){
        return ClaimRepository::listInProcess();
    }

    public static function find($id){
        return ClaimRepository::find($id);
    }

    public static function resolve($resolucion, $disputa, $comentario){
        return ClaimRepository::resolve($resolucion, $disputa, $comentario);
    }
}
