<!DOCTYPE html>
<html>
<head>
    <title>Orden Número:{{$orden->ord_id}}</title>

</head>
<body>
<h1>Orden a Realizar </h1>

@foreach($orden->publicacion->respuestas as $respuesta)
    @if($respuesta->resp_est=='seleccionada')
        <hr>
    <h2>Nombre del Producto: {{$respuesta->producto->prod_titulo}}</h2>

        <div class="row border">
        @foreach($respuesta->producto->imagenes as $imagen)
            <div class="col-sm-4">
                <img src="{{$imagen->img_url}}" height="300" width="500" />
            </div>
        @endforeach
        </div>

    <h2>Nombre del usuario: {{$respuesta->user->name}}</h2>
    <h2>Numero de Teléfono: {{$respuesta->user->phone}}</h2>
    <h2>Número de cedula: {{$respuesta->user->cedula}}</h2>
    <h2>Dirección de calle principal dada: {{$respuesta->resp_calle1}}</h2>
    <h2>Dirección de calle secundaria dada: {{$respuesta->resp_calle2 ?? ''}}</h2>
    <hr>
    @endif
@endforeach

</body>
</html>
