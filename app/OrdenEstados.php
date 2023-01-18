<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenEstados extends Model
{
    protected $fillable = [
        'ordest_id', 'ordest_estado',

    ];
    public function ordenes()
    {
        return $this->hasMany('App\Ordenes','ord_ordest_id');
    }
}
