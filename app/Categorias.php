<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_categoria',
    ];
    public function publicaciones()
    {
        return $this->hasMany('App\Publicaciones','pub_cat_id');
    }
}
