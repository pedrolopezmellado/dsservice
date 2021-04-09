<?php

namespace App\Repositories;

use App\Service;

class ServiceRepository {
    
    public static function find($id){
        return Service::find($id);
    }

    public static function all(){
        return Service::all(); 
    }

    public static function listByCategory($categoria){
        return Service::where('category_id', '=', $categoria)->get();
    }
 
}
