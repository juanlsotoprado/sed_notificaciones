<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


Route::get('/', 'App\AppController@Index');


Route::get('login', function () {
    return view("Login/Login");
});

Route::post('login', 'Login\LoginController@Validar_Ususario');
Route::get('logout', 'Login\LoginController@Cerrar_Sesion');


Route::group(['prefix' => 'admin'], function() {

    Route::get('Inicio', 'App\AppController@Inicio');

//
//    Route::get('/', function () {
//
//        return Redirect::to('admin/Inicio');
//    });
});
