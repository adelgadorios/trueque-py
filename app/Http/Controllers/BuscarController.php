<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Publicaciones;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function buscar(Request $request)
        {
            $categoria_busqueda=null;
            $titulo = null;
            $pub = (new Publicaciones())->newQuery();
            if($request->categoria != null){
                $pub->where('pub_cat_id',$request->categoria);
                $categoria_busqueda = \DB::table('categorias')->where('cat_id', $request->categoria)->first();
            }

            if($request->titulo != null){
                $titulo =$request->titulo;
                $pub->where('pub_titulo', 'like', '%'.$request->titulo.'%')
                    ->orWhere('pub_descripcion', 'like', '%'.$request->titulo.'%');
            }


            $publicaciones = $pub->paginate(15);


            return view('resultados', compact('publicaciones','categoria_busqueda','titulo'));
        }

}
