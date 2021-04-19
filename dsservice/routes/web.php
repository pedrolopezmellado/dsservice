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

Route::get('home', 'WebController@listServices');

Route::post('home', 'WebController@buscador');

Route::get('abrirDisputa', 'WebController@abrirDisputa');

Route::post('abrirDisputa', 'WebController@crearDisputa');

Route::get('inicioSesion', 'WebController@showInicioSesion');

Route::get('registro', 'WebController@showRegistro');

Route::post('registro', 'WebController@crearUsuario');

Route::post('compra', 'WebController@createPurchase');

Route::get('compra', 'WebController@createPurchase');

Route::get('crearServicio','WebController@createService');

Route::post('crearServicio','WebController@createService');

Route::get('disputas','WebController@listDisputas');
