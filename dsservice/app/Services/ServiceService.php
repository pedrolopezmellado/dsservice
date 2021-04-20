<?php

namespace App\Services;

use App\Repositories\ServiceRepository;

class ServiceService {

    public static function all(){
        return ServiceRepository::all(); 
    }

    public static function paginate($n){
        return ServiceRepository::paginate($n);
    }

    public static function searchServices($categoria, $textoParaBuscar){
        return ServiceRepository::applySearcher($categoria, $textoParaBuscar);        
    }

    public static function new($user, $name, $direction,$valoration, $description,$range_price,$category){
        return ServiceRepository::new($user, $name, $direction,$valoration, $description,$range_price,$category);
    }

    public static function modify($service,$newname,$newdirection,$newcategory,$newrange_price){
        return ServiceRepository::modify($service,$newname,$newdirection,$newcategory,$newrange_price);
    }



}
