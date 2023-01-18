<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Estados;
use App\Imagenes;
use App\Productos;
use App\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','publicacion']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id() == 1)
        {
            return redirect('/ordenes');
        }
        else{
            $publicaciones =Publicaciones::where('pub_est_id',1)->latest()->simplePaginate(15);
            return view('home',compact('publicaciones'));
        }




    }
}
