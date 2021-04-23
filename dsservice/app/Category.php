<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $incrementing=false;
    protected $primaryKey = 'name';

    public function services(){
        return $this->hasMany('App\Service','category_id','name');
    }
}
