<?php

namespace App\Repositories;

use App\User;

class UserRepository {
    

    public static function new($email, $name, $password, $phone){
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->phone = $phone;
        $user->save();
    }
 
}
