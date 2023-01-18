<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EliminarPublicacionController extends Controller
{
    public  function eliminar($pub_id){

        $est = \DB::table('estados')->where('est_estados', 'eliminada')->first();
        $publicacion = Publicaciones::find($pub_id);
        $publicacion->pub_est_id = $est->est_id;
        $publicacion->save();
        return redirect()->route('mis_publicaciones', ['user_id' => Auth::id()])->with('alert', 'La Publicación Ha sido eliminada
        ');
    }
}
