<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{

    protected $primaryKey = 'img_id';
    protected $table = 'imagenes';


    protected $fillable = [
        'img_url', 'img_prod_id',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Productos','img_prod_id');
    }
}
