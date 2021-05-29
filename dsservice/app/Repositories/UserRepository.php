<?php

namespace App\Repositories;

use App\User;

class UserRepository {
    
    public static function paginate(){
        return User::paginate(4);
    }

    public static function new($email, $name, $password, $phone, $imagen){
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->phone = $phone;
        $user->photo=$imagen;
        $user->save();
    }
    
    public static function delete($id){
        User::where("email", "=" , $id)->delete();
    }

    public static function modify($user,$newname,$newphone){
        $newuser = User::find($user);
        if($newname != ""){
            $newuser->name = $newname;
        }

        if($newname != ""){
            $newuser->name = $newname;
        }

        if($newphone != ""){
            $newuser->phone = $newphone;
        }

        $newuser->save();
    }
 
}
