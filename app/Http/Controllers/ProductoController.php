<?php

namespace App\Http\Controllers;

use App\Imagenes;
use App\Mail\ProductoRecibido;
use App\Ordenes;
use App\Productos;
use App\Publicaciones;
use App\Respuestas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class ProductoController extends Controller
{
    public function store(Request $request,$pub_id){
        $respuesta = new Respuestas();
        $respuesta->resp_user_id=Auth::id();
        $respuesta->resp_est = 'rechazada';
        $respuesta->resp_pub_id = $pub_id;
        $respuesta->resp_calle1 = $request->calle1;
        $respuesta->resp_calle2 = $request->calle2;
        $respuesta->save();

        $producto = new Productos();
        $producto->prod_titulo = $request->producto;
        $producto->prod_pub_id = $pub_id;
        $producto->prod_resp_id = $respuesta->resp_id;
        $producto->save();
        $imagenes_prod =  $request->file('imagenes');

        foreach ($imagenes_prod as $imagen_prod){
            $path = $imagen_prod->store('images','public');
            Imagenes::create([
                'img_url' => $path,'img_prod_id' => $producto->prod_id,
            ]);


        }
        Mail::to($producto->publicacion->user->email)->send(new ProductoRecibido());

        return redirect('/publicacion/'.$pub_id)->with('alert', 'Tu producto ha sido enviado al publicador, te mandara un mensaje si esta interesado en tu producto');
    }
    public function productos($pub_id){
        $productos = Productos::where('prod_pub_id',$pub_id)->get();
        return view('productos',compact('productos','pub_id'));
    }

    public function ver_producto($prod_id){
        $producto = Productos::where('prod_id',$prod_id)->first();
        $respuesta = Respuestas::find($prod_id);
        $publicacion = Publicaciones::find($producto->prod_pub_id);
        $user = User::find($respuesta->resp_user_id);
        return view('ver_producto',compact('producto','user','publicacion'));
    }
    public function create($pub_id){
        return view('responder',compact('pub_id'));
    }
}
