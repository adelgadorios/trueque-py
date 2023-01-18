

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Mis Publicaciones</h1>
    <hr/>
    <div class="wrapper" >
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
                                    <a href="/productos/{{$publicacion->pub_id}}" ><h4 class="card-title">{{$publicacion->pub_titulo}}</h4></a>
                                    <p class="card-text">{{$publicacion->pub_descripcion}}</p>
                                    <form action="/eliminar/{{$publicacion->pub_id}}" method="POST" >
                                        @csrf
                                        <div class="form-group row mb-0">

                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Esta seguro que quieres eliminar esta publicación?');">
                                                    Eliminar Publicación
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


