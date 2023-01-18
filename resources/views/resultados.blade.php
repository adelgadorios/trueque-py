

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trueque</a></li>
                        @if(!empty($categoria_busqueda->cat_id))
                            <li class="breadcrumb-item">{{$categoria_busqueda->cat_categoria}}</li>
                        @else
                            <li class="breadcrumb-item">Todas Las Categorías</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="wrapper" >
            @if($publicaciones->isEmpty())
                <h1>No se encontro ninguna publicacion con esos parametro de búpsqueda</h1>
            @endif
            @foreach($publicaciones as $publicacion)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-horizontal">
                                    <div class="img-square-wrapper.mh-100 " >
                                        @foreach($publicacion->productos as $producto)
                                            @if ($loop->first)
                                                @foreach($producto->imagenes as $imagen)
                                                    @if ($loop->first)
                                                        <img src="{{ asset('storage/'.$imagen->img_url) }}"   alt="Imagen del prodcuto">
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card-body " >
                                        <a href="/publicacion/{{$publicacion->pub_id}}" > <h4 class="card-title">{{$publicacion->pub_titulo}}</h4></a>
                                        <p class="card-text"> {{$publicacion->pub_descripcion}}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
@endsection





