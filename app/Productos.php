<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "productos";
    protected $primaryKey = 'prod_id';
    protected $fillable = [
        'prod_titulo', 'prod_pub_id', 'prod_user_id','prod_resp_id'
    ];

    public function imagenes()
    {
        return $this->hasMany('App\Imagenes', 'img_prod_id');
    }
    public function publicacion()
    {
        return $this->belongsTo('App\Publicaciones','prod_pub_id');
    }
    public function respuesta()
    {
        return $this->belongsTo('App\Respuestas','prod_resp_id');
    }

}
