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

Route::get('/', 'WebController@showHome');

Route::get('home', 'WebController@showHome');

Route::get('home/buscador', 'WebController@buscador');

Route::get('home/ordenar', 'WebController@ordenarServicios');

//Route::post('homeRegistrado', 'WebController@eliminarUsuario');

// Route::get('inicioSesion', 'WebController@showInicioSesion');

// Route::post('inicioSesion', 'WebController@iniciarSesion');

Route::get('registro', 'WebController@showRegistro');

Route::post('registro', 'WebController@crearUsuario');

Route::get('servicio/{service}', [
    'as' => 'servicio',
    'uses' => 'WebController@verService',
]);

Route::middleware('onlyadmin')->group(function() {
    Route::get('homeAdministrador', 'WebController@showHomeAdmin');
    
    Route::get('listaUsuarios', 'WebController@listarUsuarios');
    Route::post('listaUsuarios/delete', 'WebController@deleteUser');

    Route::get('listaCategorias','WebController@listCategory');
    Route::post('listaCategorias/create','WebController@createCategory');    
    Route::post('listaCategorias/modify','WebController@modifyCategory');
    Route::post('listaCategorias/delete','WebController@deleteCategory');
});


Auth::routes();

Route::get('/homeRegistrado', 'HomeController@index')->name('homeRegistrado');

Route::get('homeRegistrado/buscador', 'HomeController@buscadorRegistrado');

Route::get('homeRegistrado/ordenar', 'HomeController@ordenarServiciosRegistrado');

Route::post('homeRegistrado/modificar', 'HomeController@modifyUser');

Route::get('crearServicio','HomeController@createService');

Route::post('crearServicio','HomeController@createService');

Route::get('disputas','HomeController@listClaims');

Route::post('disputas/delete', 'HomeController@deleteClaim');

Route::get('listaServicios', 'HomeController@myServices');

Route::get('editarServicio/{service}', [ 
    'as' => 'editarServicio',
    'uses' => 'HomeController@showEditarServicio',
]);

Route::post('editarServicio', 'HomeController@modifyService');

Route::post('listaServicios','HomeController@deleteService');

Route::get('myPurchases','HomeController@myPurchases');

Route::get('myPurchases/tipo','HomeController@tipoPurchases');

Route::get('myPurchases/filter','HomeController@ordenarPurchases');

Route::post('myPurchases/delete','HomeController@deletePurchase');

Route::get('abrirDisputa', 'HomeController@abrirDisputa');

Route::post('abrirDisputa', 'HomeController@crearDisputa');

Route::get('detailedPurchase/{purchase}', [
    'as' => 'detailedPurchase',
    'uses' => 'HomeController@verPurchase',
]);

Route::post('detailedPurchase/valorando','HomeController@changeValoration');

Route::post('detailedPurchase','HomeController@changeComentario');

Route::get('compra', 'HomeController@realizarCompra');

Route::post('compra/confirm', 'HomeController@createPurchase');
