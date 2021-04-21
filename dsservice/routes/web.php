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

Route::get('home', 'WebController@showHome');

Route::get('home/buscador', 'WebController@buscador');

Route::post('home/ordenar', 'WebController@ordenarServicios');

Route::get('homeRegistrado', 'WebController@showHomeRegistrado');

Route::post('homeRegistrado', 'WebController@eliminarUsuario');

Route::get('abrirDisputa', 'WebController@abrirDisputa');

Route::post('abrirDisputa', 'WebController@crearDisputa');

Route::get('inicioSesion', 'WebController@showInicioSesion');

Route::post('inicioSesion', 'WebController@iniciarSesion');

Route::get('registro', 'WebController@showRegistro');

Route::post('registro', 'WebController@crearUsuario');

Route::post('compra', 'WebController@createPurchase');

Route::get('compra', 'WebController@createPurchase');

Route::get('crearServicio','WebController@createService');

Route::post('crearServicio','WebController@createService');

Route::get('disputas','WebController@listClaims');

Route::post('disputas/delete', 'WebController@deleteClaim');

Route::get('listaCategorias','WebController@listCategory');

Route::post('listaCategorias/create','WebController@createCategory');

Route::post('listaCategorias/modify','WebController@modifyCategory');

Route::post('listaCategorias/delete','WebController@deleteCategory');

Route::get('myPurchases','WebController@myPurchases');

Route::post('myPurchases/delete','WebController@deletePurchase');

Route::get('homeAdministrador', 'WebController@listarUsuarios');

Route::post('homeAdministrador/delete', 'WebController@deleteUser');

Route::get('editarServicio', 'WebController@showEditarServicio');

Route::post('editarServicio', 'WebController@modifyService');

