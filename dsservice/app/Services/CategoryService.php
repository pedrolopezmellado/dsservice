<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService {
    
    public static function new($name){
        return CategoryRepository::new($name);
    }

    public static function all(){
        return CategoryRepository::all(); 
    }

    public static function modify($name,$newname){
        return CategoryRepository::modify($name,$newname);
    }

    public static function delete($name){
        return CategoryRepository::delete($name);
    }
}
