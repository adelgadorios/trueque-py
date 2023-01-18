

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Productos que te ofrecen para trueque</h1>
    <hr/>
    <div class="wrapper" >

    @foreach($productos as $producto)
        @if($loop->first)
            @continue
            @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper.mh-100 " >

                                @foreach($producto->imagenes as $imagen)
                                    @if ($loop->first)
                                        <img src="{{ asset('storage/'.$imagen->img_url) }}"   alt="Imagen del prodcuto">
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-body">
                                <a href="/ver_producto/{{$producto->prod_id}}" ><h4 class="card-title">{{$producto->prod_titulo}}</h4></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endforeach


</div>
@endsection

