<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {

    public static function all(){
        return UserRepository::all();
    }
    
    public static function new($email, $name, $password, $phone){
        return UserRepository::new($email, $name, $password, $phone);
    }

    public static function delete($id){
        return UserRepository::delete($id);
    }

}
