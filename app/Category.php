<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
}
