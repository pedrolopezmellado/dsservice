<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use App\Service;

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

    public static function applyOrder($categoria,$texto, $orden){
        return ServiceRepository::applyOrder($categoria,$texto, $orden);        
    }

    public static function new($user, $name, $direction,$valoration, $description,$range_price,$category,$imagen){
        return ServiceRepository::new($user, $name, $direction,$valoration, $description,$range_price,$category,$imagen);
    }

    public static function modify($service,$newname,$newdirection,$newcategory,$newrange_price){
        return ServiceRepository::modify($service,$newname,$newdirection,$newcategory,$newrange_price);
    }

    public static function delete($id){
        return ServiceRepository::delete($id);
    }

    public static function listByUser($email){
        return ServiceRepository::listByUser($email);
    }

    public static function find($id){
        return ServiceRepository::find($id);
    }


    public static function newvalor($newvalor,$id){
        return ServiceRepository::newvalor($newvalor,$id);
    }

}
