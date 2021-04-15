<?php

namespace App\Repositories;

use App\Category;

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
        Category::where($name, $category->name)->name = $newname;
    }

     //No estoy seguro del delete (todavía)
     public static function delete($name){
        Category::where('name', $name)->delete();
    }


}
