<?php

namespace App\Repositories;

use App\Category;
use App\Purchase;
use App\Service;

class CategoryRepository {
    
    public static function find($name){
        return Category::find($name);
    }

    //Mostrar todos
    public static function all(){
        return Category::all(); 
    }

    public static function new($name){
        $category = new Category();
        $category->name = $name;
        $category->save();
    }
 
    //No estoy seguro (todavía)
    public static function modify($name,$newname){
        $categoria = Category::findOrFail($name);
        $categoria->name = $newname;
        $categoria->update();
    }

     //No estoy seguro del delete (todavía)
     public static function delete($name){
        Category::findOrFail($name)->delete();
    }

    public static function cambiarASinCAtegoria($categoria){
        $services = Service::where('category_id','=',$categoria)->get();
        foreach ($services as $service){
           $purchase = Purchase::where('service_id','=',$service->id)->where('accepted','=','inprocess')->get();
            if(!$purchase->isEmpty()){
             $service->category_id = 'Sin Categoria';
             $service->save();
             }
        }
    }

}
