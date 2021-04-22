<?php

namespace App\Repositories;

use App\Category;
use App\Service;
use App\User;

class ServiceRepository {
    
    public static function find($id){
        return Service::find($id);
    }

    public static function paginate($n){
        return Service::paginate($n);
    }

    public static function all(){
        return Service::all(); 
    }

    public static function applySearcher($categoria, $textoParaBuscar){
        if($categoria == "Ninguna"){
            return Service::where('name', 'LIKE', "%{$textoParaBuscar}%")->paginate(6);
        }
        else
        return Service::where('category_id', '=', $categoria)->where('name', 'LIKE', "%{$textoParaBuscar}%")->paginate(6);
    }

    public static function applyOrder($categoria, $textoParaBuscar, $orden){
        if($categoria == "Ninguna"){
            if($orden == "SinOrden"){
                return Service::where('name', 'LIKE', "%{$textoParaBuscar}%")->paginate(6);
            }else if($orden == "NombreAscendente"){
                return Service::where('name', 'LIKE', "%{$textoParaBuscar}%")->orderBy('name', 'asc')->paginate(6);
            }else{
                return Service::where('name', 'LIKE', "%{$textoParaBuscar}%")->orderBy('name', 'desc')->paginate(6);
            }       
        }
        else

        if($orden == "SinOrden"){
           return Service::where('category_id', '=', $categoria)->where('name', 'LIKE', "%{$textoParaBuscar}%")->paginate(6);

        }else if($orden == "NombreAscendente"){
            return Service::where('category_id', '=', $categoria)->where('name', 'LIKE', "%{$textoParaBuscar}%")->orderBy('name', 'asc')->paginate(6);

        }else{
            return Service::where('category_id', '=', $categoria)->where('name', 'LIKE', "%{$textoParaBuscar}%")->orderBy('name', 'desc')->paginate(6);
        }       
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

    public static function modify($service,$newname,$newdirection,$newcategory,$newrange_price){

        $newservice = Service::find($service);
        if($newname != ""){
            $newservice->name = $newname;
        }

        if($newdirection != ""){
            $newservice->direction = $newdirection;
        }

        if($newcategory != "Ninguna"){
            $categoria = Category::find($newcategory);
            $newservice->category()->associate($categoria);
        }

        if($newrange_price != ""){
            $newservice->range_price = $newrange_price;
        }

        $newservice->save();
    }

    public static function listByUser($email){
        return Service::where('user_id', '=', $email)->paginate(3);
    }
 
}
