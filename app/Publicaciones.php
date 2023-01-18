<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table = "publicaciones";
    protected $primaryKey = 'pub_id';
    protected $fillable = [
        'pub_titulo', 'pub_descripcion','pub_zona'
        ,'pub_departamento','pub_user_id','pub_cat_id',
        'pub_est_id',
    ];

    public function productos()
    {
        return $this->hasMany('App\Productos','prod_pub_id','pub_id');
    }
    public function respuestas()
    {
        return $this->hasMany('App\Respuestas','resp_pub_id','pub_id');
    }
    public function categoria() {
        return $this->belongsTo('App\Categorias','pub_cat_id');
    }
    public function user() {
        return $this->belongsTo('App\User','pub_user_id');
    }
    public function orden() {
        return $this->hasOne('App\Ordenes','ord_pub_id');
    }
}
