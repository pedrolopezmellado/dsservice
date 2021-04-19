<?php

namespace App\Services;

use App\Repositories\ServiceRepository;

class ServiceService {

    public static function all(){
        return ServiceRepository::all(); 
    }

    public static function listByCategory($categoria){
        if($categoria == "Ninguna"){
            return ServiceRepository::all(); 
        }else{
            return ServiceRepository::listByCategory($categoria);        
        }
    }

    public static function new($user, $name, $direction,$valoration, $description,$range_price,$category){
        return ServiceRepository::new($user, $name, $direction,$valoration, $description,$range_price,$category);
    }

}
