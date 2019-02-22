<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Muestra la información de todos los dispositivos guardados en la base de datos
Route::get('coordenadas', 'CoordenadasController@getAll');

// Registra en la base de datos la informacion de un nuevo dispositivo
Route::post('coordenadas/registro', 'CoordenadasController@nuevoRegistro');

// Registra en la base de datos la ubicación de un dispositivo
Route::post('coordenadas/registroCoordenadas', 'CoordenadasController@registroUbicacion');

// Actualiza en la base de datos la ubicación de un dispositivo
Route::post('coordenadas/actualizarCoordenadas', 'CoordenadasController@actualizarUbicacion');