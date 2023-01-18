

@extends('layouts.app')
@section('title', $publicacion->pub_titulo)
@section('content')

<div class="container">
    @push('styles')
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{ asset('css/carousel.scss') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    @endpush
        @push('scripts')

            <script src="{{ asset('js/carousel.js') }}" defer></script>
            <script>
                $(window).load(function () {
                    var msg = '{{Session::get('alert')}}';
                    var exist = '{{Session::has('alert')}}';
                    if(exist){
                        alert(msg);
                    }
                });

            </script>
        @endpush



    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        @if(!empty($categoria))
                        <li class="breadcrumb-item">{{$categoria->cat_categoria}}</li>
                        @else
                            <li class="breadcrumb-item">Todas Las Categorías</li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{$producto->prod_titulo}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

        <!--Carousel Wrapper-->
        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                @foreach($imagenes as $imagen)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/'.$imagen->img_url) }} "height="500vh"  alt="Imagen Del Producto">

                </div>
                @endforeach
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
            <ol class="carousel-indicators">
                @foreach($imagenes as $imagen)
                <li data-target="#carousel-thumb" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/'.$imagen->img_url) }}" class="img-fluid">

                </li>
                @endforeach
            </ol>
        </div>
        <!--/.Carousel Wrapper-->


    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$publicacion->pub_titulo}}</h1>
            <h2 class="jumbotron-heading">Producto de Interés: {{$publicacion->pub_cambio}}</h2>

        </div>
    </section>

    <div class="col-12">
        <div class="card border-light mb-3">
            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Descripción</div>
            <div class="card-body">
                <p class="card-text" style="font-size: 15pt">
                    {{$publicacion->pub_descripcion}}
                </p>

            </div>
        </div>
    </div>
        @if($publicacion->pub_user_id != Auth::id())
    <div class="container">
        <div class="row">
            <!-- Add to cart -->
            <div class="col-12 col-lg-6 add_to_cart_block">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                            <a href="/responder/{{ $publicacion->pub_id }}" class="btn btn-success btn-lg btn-block text-uppercase">
                                 Responder con tu producto
                            </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>






</div>
@endsection
