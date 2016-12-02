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


Route::group(['middleware' => ['Auth_ldap', 'RoleMiddleware:0']], function () {

    Route::get('/', function () {
        return view("Login/Login");
    });
});

Route::get('login', function () {
    return view("Login/Login");
});

Route::post('login', 'Login\LoginController@Validar_Ususario');
Route::get('logout', 'Login\LoginController@Cerrar_Sesion');


Route::group(['middleware' => 'RoleMiddleware:1', 'prefix' => 'admin'], function() {

    Route::get('/', function () {

        return Redirect::to('admin/Inicio');
    });

    Route::get('Inicio', 'App\AppController@Inicio');
    Route::get('admin_usuario', 'Admin\AdminController@admin_usuario');

    Route::post('get_user', 'Admin\AdminJsonController@get_usuario');
    Route::post('get_perfiles', 'Admin\AdminJsonController@get_perfiles');
    Route::post('registrar_modificar_funcionario', 'Admin\AdminJsonController@registrar_modificar_funcionario');
    Route::post('set_estatus', 'Admin\AdminJsonController@set_estatus');


});



Route::group(['middleware' => 'RoleMiddleware:4', 'prefix' => 'analista'], function() {

    Route::get('/', function () {

        return Redirect::to('analista/Inicio');
    });

    Route::get('Inicio', 'App\AppController@Inicio');
});
