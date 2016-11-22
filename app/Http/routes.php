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



Route::get('/', function () {

    return Redirect::to('app/Inicio');
});


Route::get('app', function () {

    return Redirect::to('/');
});


Route::get('logout', 'Login\LoginController@Cerrar_Sesion');


Route::group(['prefix' => 'app'], function() {

    Route::get('login', 'Login\LoginController@Index');
    Route::post('login', 'Login\LoginController@Validar_Ususario');
    Route::get('Inicio', 'App\AppController@Index');
});
