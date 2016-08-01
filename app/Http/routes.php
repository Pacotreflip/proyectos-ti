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
Route::resource('proyecto', 'ProyectosController');
Route::resource('solicitudes.documentos', 'DocumentosController');

Route::resource('proyectos.solicitudes', 'SolicitudesController');

Route::group(['prefix' => 'api'], function () {
    Route::get('users', 'UsersController@index');
});

Route::get('/', 'PagesController@home')->name('home');

//Autenticación
Route::get('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);
