<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Imagenes;
use App\Productos;
use App\Publicaciones;
use App\Respuestas;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Symfony\Component\Console\Input\Input;


class PublicacionController extends Controller
{
    public function create(){
        return view('publicar');
    }

   public function store(Request $request){

       $cat = \DB::table('categorias')->where('cat_categoria', $request->categoria)->first();
        $est = \DB::table('estados')->where('est_estados', 'activa')->first();
        $publicacion = new Publicaciones();
        $publicacion->pub_user_id = Auth::id();
        $publicacion->pub_titulo = $request->titulo;
        $publicacion->pub_descripcion = $request->descripcion;
        $publicacion->pub_cambio = $request->cambio;
        if ($cat){
            $publicacion->pub_cat_id =$cat->cat_id;
        }
        $publicacion->pub_zona = $request->zona;
        $publicacion->pub_departamento = $request->departamento;
        $publicacion->pub_est_id = $est->est_id;
        $publicacion->pub_delivery_op = $request->delivery_op;
        $publicacion->save();

        $respuesta = new Respuestas();
        $respuesta->resp_user_id=Auth::id();
        $respuesta->resp_calle1 = $request->calle1;
        $respuesta->resp_calle2 = $request->calle2;
        $respuesta->resp_est = 'seleccionada';
        $respuesta->resp_pub_id = $publicacion->pub_id;
        $respuesta->save();

        $producto = new Productos();
        $producto->prod_titulo = $request->producto;
        $producto->prod_pub_id = $publicacion->pub_id;
        $producto->prod_resp_id = $respuesta->resp_id;
        $producto->save();


        $imagenes_prod =  $request->file('imagenes');

       foreach ($imagenes_prod as $imagen_prod){
           $path = $imagen_prod->store('images','public');
           Imagenes::create([
               'img_url' => $path,'img_prod_id' => $producto->prod_id,
           ]);


       }


       return redirect('/');
   }
    public function publicacion($pub_id){
        $publicacion = Publicaciones::findOrFail($pub_id);

        return view('publicacion',compact('publicacion'));
    }
    public function mis_publicaciones($user_id){
        $publicaciones =Publicaciones::where('pub_user_id',$user_id)
            ->where('pub_est_id',1)->get();
        return view('mis_publicaciones',compact('publicaciones'));
    }
}
