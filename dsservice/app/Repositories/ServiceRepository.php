<?php

namespace App\Repositories;

use App\Category;
use App\Service;
use App\User;

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

    public static function new($user, $name, $direction,$valoration, $description,$range_price,$category){
        $service = new Service();
        $service->name= $name;
        $service->direction= $direction;
        $service->valoration=$valoration;
        $service->description = $description;
        $service->range_price = $range_price;
        $usuario = User::find($user);
        $categoria = Category::find($category);
        $service->category()->associate($categoria);
        $service->user()->associate($usuario);
        $service->save();
    }
 
}
