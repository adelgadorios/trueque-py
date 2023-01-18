<?php

namespace App\Http\Controllers;

use App\Estados;
use App\Mail\TruequeCompletado;
use App\Ordenes;
use App\OrdenEstados;
use App\Productos;
use App\Publicaciones;
use App\Respuestas;
use App\User;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdenController extends Controller
{
    public function enviar_orden(Request $request,$prod_id){
        $est = \DB::table('estados')->where('est_estados', 'eliminada')->first();
        $ordest = \DB::table('orden_estados')->where('ordest_estado', 'activa')->first();


        $producto = Productos::where('prod_id',$prod_id);

        $producto->respuesta->resp_est = 'seleccionada';


        $producto->publicacion->pub_est_id = $est->est_id;
        $orden =new Ordenes();
        $orden->ord_pub_id =$producto->prod_pub_id;
        $orden->ord_ordest_id = $ordest->ordest_id;
        $orden->save();

        return view('trueque_completado');
    }
    public function ordenes(){
        $ordenes = Ordenes::where('ord_ordest_id',1)->get();
        return view('ordenes',compact('ordenes'));
    }
    public function completar($ord_id){
        ini_set('max_execution_time', 300);
        $ordest = \DB::table('orden_estados')->where('ordest_estado', 'competada')->first();
        $orden = Ordenes::where('ord_id',$ord_id)->first();
        $orden->ord_ordest_id = $ordest->ordest_id;
        foreach ($orden->publicacion->respuestas as $respuesta){
            if ($respuesta->resp_est == 'seleccionada'){
                foreach ($respuesta->producto->imagenes as $imagen){
                    Mail::to($respuesta->user->email)->send(new TruequeCompletado());
                    $path = 'storage/'.$imagen->img_url;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $imagen->img_url = $base64;


                }
            }
        }
        $data = compact('orden');
        $pdf = PDF::loadView('ordenPDF', $data);
        return $pdf->download('orden:'.$ord_id.'.pdf') ;

    }

}
