<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    protected $primaryKey = 'ord_id';
    protected $fillable = [
        'ord_pub_id', 'ord_ordest_id',
    ];
    public function publicacion() {
        return $this->belongsTo('App\Publicaciones','ord_pub_id');
    }
    public function orden_estado() {
        return $this->belongsTo('App\OrdenEstados','ord_ordest_id');
    }
}
