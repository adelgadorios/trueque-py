<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $fillable = [
        'estpub_id', 'estpub_estados',

    ];
    public function publicaciones()
    {
        return $this->hasMany('App\Publicaciones','pub_est_id');
    }
}
