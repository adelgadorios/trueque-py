

@extends('layouts.app')
@section('title', $producto->prod_titulo)
@section('content')

<div class="container">
    @push('styles')
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{ asset('css/carousel.scss') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    @endpush
        @push('scripts')
            <script src="{{ asset('js/carousel.js') }}" defer></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        @endpush
    <h1>Producto enviado por {{$user->name}}</h1>
        <hr>
        <!--Carousel Wrapper-->
        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                @foreach($producto->imagenes as $imagen)
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
                @foreach($producto->imagenes as $imagen)
                <li data-target="#carousel-thumb" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('storage/'.$imagen->img_url) }}" class="img-fluid">

                </li>
                @endforeach
            </ol>
        </div>
        <!--/.Carousel Wrapper-->


    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Nombre Del Producto: {{$producto->prod_titulo}}</h1>


        </div>
    </section>
        <section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 add_to_cart_block">
                <div class="card bg-light mb-3 ">
                    <div class="card-body ">
                            <a href="https://api.whatsapp.com/send?phone={{ $user->phone }}&text=Estoy%20interesado%20en%20el%20produccto%20que%20me%20enviaste%2C%20Sera%20que%20me%20podrias%20proporcionar%20m%C3%A1s%20detalles%3F" target=”_blank class="btn btn-success btn-lg btn-block text-uppercase">
                                <i class="fa fa-whatsapp"></i> Responder al interesado
                            </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
        @if($publicacion->pub_delivery_op =='si')
            <div class="container">
            <form action="/enviar_orden/{{$producto->prod_id}}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6 add_to_cart_block">
                        <div class="card bg-light mb-3">
                            <div class="card-body">

                <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro que quieres completar el trueque?');">
                    Confirmar Trueque
                </button>

                            </div>
                        </div>
                     </div>
                </div>
            </form>
        </div>
            @endif
    </section>



</div>
@endsection
