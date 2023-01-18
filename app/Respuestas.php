<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    protected $table = "respuestas";
    protected $primaryKey = 'resp_id';
    protected $fillable = [
        'resp_user_id','resp_pub_id','resp_est','resp_calle1','resp_calle2'
    ];
    public function user() {
        return $this->belongsTo('App\User','resp_user_id');
        // belongsTo es para obtener la tabla que está relacionada con ESTA TABLA, para el estado lo mismo
    }
    public function producto()
    {
        return $this->hasOne('App\Productos','prod_resp_id');
    }
    public function publicacion()
    {
        return $this->belongsTo('App\Publicaciones','resp_pub_id');
    }
}
