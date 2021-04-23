<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {

    public static function paginate(){
        return UserRepository::paginate();
    }
    
    public static function new($email, $name, $password, $phone){
        return UserRepository::new($email, $name, $password, $phone);
    }

    public static function delete($id){
        return UserRepository::delete($id);
    }

    public static function modify($user,$newname,$newphone){
        return UserRepository::modify($user,$newname,$newphone);
    }

}
