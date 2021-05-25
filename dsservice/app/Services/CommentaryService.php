<?php

namespace App\Services;

use App\Repositories\CommentaryRepository;

class CommentaryService {

    public static function paginate($n){
        return CommentaryRepository::paginate($n);
    }
    
    public static function new($comentario){
        return CommentaryRepository::new($comentario);
    }

}
