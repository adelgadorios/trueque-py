<?php

use Illuminate\Support\Facades\Route;


Route::get('/ordenes', 'OrdenController@ordenes')->middleware('admin');
Route::post('/completar/{ord_id}', 'OrdenController@completar')->middleware('admin');

Route::get('/', 'HomeController@index');
Route::get('/publicar', 'PublicacionController@create')->middleware('auth');
Route::get('/mis_publicaciones/{user_id}', 'PublicacionController@mis_publicaciones')->name('mis_publicaciones');
Route::get('/publicacion/{pub_id}', 'PublicacionController@publicacion');
Route::post('/store', 'PublicacionController@store');
Route::post('/eliminar/{pub_id}', 'EliminarPublicacionController@eliminar');

Route::get('/responder/{pub_id}', 'ProductoController@create')->middleware('auth');
Route::get('/productos/{pub_id}', 'ProductoController@productos');
Route::get('/ver_producto/{prod_id}', 'ProductoController@ver_producto');

Route::post('/enviar_orden/{prod_id}', 'OrdenController@enviar_orden');
Route::post('/store_prod/{pub_id}', 'ProductoController@store');
Route::post('/buscar', 'BuscarController@buscar');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

