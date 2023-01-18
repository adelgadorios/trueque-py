

@extends('layouts.app')
@section('title', 'Trueque completado')
@section('content')

<div class="container">
    @push('styles')
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    @endpush

    <div class="container">
        <h1>El trueque Ha sido completado con éxito </h1>
        <h2>Tu orden ha sido mandada a nuestro sistema de delivery que estara en contacto contigo en unos momentos</h2>
       <h3> <a href="/">Volver al inicio</a></h3>
    </div>

@endsection
