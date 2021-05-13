<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\DB;

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

    /*public static function delete($name){
        return CategoryRepository::delete($name);
    }*/

    public static function cambiarASinCAtegoria($categoria){
        DB::beginTransaction();
        try{
        CategoryRepository::cambiarASinCAtegoria($categoria);
        CategoryRepository::delete($categoria);
        } catch (Exception $e){
            DB::rollback();
        }
        DB::commit();
    } 
}
