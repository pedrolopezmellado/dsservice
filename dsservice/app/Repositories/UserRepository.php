<?php

namespace App\Repositories;

use App\User;

class UserRepository {
    
    public static function all(){
        return User::all();
    }

    public static function new($email, $name, $password, $phone){
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->phone = $phone;
        $user->save();
    }

    public static function currentUser(){
        return User::find("dario@gmail.com");
    }

    public static function delete($id){
        User::where("email", "=" , $id)->delete();
    }
 
}
