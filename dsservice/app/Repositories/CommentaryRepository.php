<?php

namespace App\Repositories;

use App\Commentary;

class CommentaryRepository {
    
    public static function paginate($n){
        return Commentary::paginate($n);
    }

    public static function new($comentario){
        $commentary = new Commentary();
        $commentary->commentary = $comentario;
        $commentary->save();
    }
 
}
