

@extends('layouts.app')

@section('content')
    <h1 class="text-center ">Publicaciones Recientes</h1>
    <hr>
    @foreach($publicaciones as $publicacion)
    <section>
        <div class="container py-3">
            <div class="card">
                <div class="row ">
                    <div class="col-md-4">
                        @foreach($publicacion->productos as $producto)
                            @if ($loop->first)
                                @foreach($producto->imagenes as $imagen)
                                    @if ($loop->first)
                                        <img src="{{ asset('storage/'.$imagen->img_url) }}"  class="w-100"   alt="Imagen del prodcuto" >
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-8 px-3">
                        <div class="card-block px-3">
                            <a href="/publicacion/{{$publicacion->pub_id}}" ><h4 class="card-title">{{$publicacion->pub_titulo}}</h4></a>
                            <p class="card-text">{{$publicacion->pub_descripcion}}</p>
                            @if($publicacion->pub_delivery_op == 'si')
                            <p class="text-danger">*Esta publicacion utiliza el sistema de delivery de ambos productos</p>
                            @else
                                <br>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endforeach

@endsection





