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
        });

        Route::name('negocio.')->prefix("negocio")->group(function(){
            Route::get('/', 'NegocioController@ListadoView')->name("listado.get");
            Route::get('nuevo', 'NegocioController@NuevoView')->name("nuevo.get");
            Route::get('edicion/{id}', 'NegocioController@EditarView')->name("edicion.get");
            Route::post('negocio', 'NegocioController@Nuevo')->name("nuevo.post");
        });
    });
});


