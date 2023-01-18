

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Ordenes</h1>
    <hr/>
    <div class="wrapper" >

        @foreach($ordenes as $orden)
            <section>
                <div class="container py-3">
                    <div class="card">
                        <div class="row ">
                            <div class="col-md-4">
                                @foreach($orden->publicacion->productos as $producto)
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

                                            <h4 class="card-title">Orden Número: {{$orden->ord_id}}</h4>

                                    <form action="/completar/{{$orden->ord_id}}" method="POST" >
                                        @csrf
                                        <div class="form-group row mb-0">

                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Los datos de la orden seran proveidos en un pdf y la orden se dara por completada en el sistema');">
                                                    Recibir Detalles Y marcar como completada
                                                </button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        @endforeach
</div>
</div>
<script>
    $(window).load(function () {
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    });
</script>
@endsection


