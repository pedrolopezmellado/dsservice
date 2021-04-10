<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService {
    
    public static function new($email, $name, $password, $phone){
        return UserRepository::new($email, $name, $password, $phone);
    }

}
