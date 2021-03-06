<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login-post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('registro', 'Auth\RegisterController@RegistroView')->name('registro.get');
Route::post('registro', 'Auth\RegisterController@Crear')->name('registro.post');
Route::get('terminos-condiciones', function(){ return view("auth.acuerdos"); })->name('acuerdos.get');


Route::namespace('Web')->group(function(){
    Route::name('web.')->group(function(){
        Route::get('/', 'HomeController@showIndex')->name("home");
        Route::get('resultados', 'HomeController@showResultados')->name("resultados");
        Route::get('negocio/{nombreNegocio}', 'HomeController@showNegocio')->name("negocio");
        Route::get('negocio/{nombreNegocio}/{nombreSucursal}', 'HomeController@showSucursal')->name("sucursal");
        Route::get('como-funciona', 'HomeController@showComoFunciona')->name("comofunciona");


        Route::name('catalogos.')->prefix("catalogos")->group(function(){
            Route::get('departamentos', 'CatalogosController@GetDepartamentos')->name("departamentos");
            Route::get('municipios', 'CatalogosController@GetMunicipios')->name("municipios");
            Route::get('categorias', 'CatalogosController@GetCategorias')->name("categorias");
            Route::get('formaspago', 'CatalogosController@GetFormaspago')->name("formaspago");
        });
    });
});

Route::namespace('App')->group(function(){
    Route::name('app.')->prefix("app")->middleware(['middleware' => 'auth'])->group(function(){
        Route::get('home', function(){ return view("App.Home"); })->name("home.get");

        Route::name('perfil.')->prefix("perfil")->group(function(){
            Route::View('/', 'App.Perfil.Index')->name("perfil.get");
            Route::View('cambio-clave', 'App.Perfil.CambioClave')->name("cambioclave.get");
            Route::View('eliminar-cuenta', 'App.Perfil.EliminarCuenta')->name("eliminarcuenta.get");
        });

        Route::name('negocio.')->prefix("negocio")->group(function(){
            Route::get('/', 'NegocioController@ListadoView')->name("listado.get");
            Route::post('/', 'NegocioController@ListadoNegocio')->name('listado.post');
            Route::get('nuevo', 'NegocioController@NuevoView')->name("nuevo.get");
            Route::post('negocio', 'NegocioController@Nuevo')->name("nuevo.post");
            Route::get('edicion/{neg}', 'NegocioController@EditarView')->name("edicion.get");
            Route::post('edicion/{neg}', 'NegocioController@Editar')->name('edicion.post');
            Route::post('eliminar/{neg}', 'NegocioController@EliminarNegocio')->name('eliminar.post');
        });

        Route::name('sucursales.')->prefix("sucursales")->group(function(){
            Route::get('/{neg}', 'SucursalesController@ListadoView')->name("listado.get");
            Route::post('/{neg}', 'SucursalesController@ListadoSucursal')->name('listado.post');
            Route::get('nuevo/{neg}', 'SucursalesController@NuevoView')->name("nuevo.get");
            Route::post('nuevo/{neg}', 'SucursalesController@Nuevo')->name("nuevo.post");
            Route::get('edicion/{suc}', 'SucursalesController@EditarView')->name("edicion.get");
            Route::post('edicion/{suc}', 'SucursalesController@Editar')->name('edicion.post');
            Route::post('eliminar/{suc}', 'SucursalesController@EliminarSucursal')->name('eliminar.post');
        });
    });
});


