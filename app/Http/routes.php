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
Route::resource('proyectos', 'ProyectosController');
Route::resource('solicitud.documentos', 'DocumentosController');
Route::resource('proyecto.solicitudes', 'SolicitudesController');
Route::resource('analisis.cuestionarios', 'CuestionariosController');

//Etapas
Route::get('proyecto/{proyecto}/etapas', 'PagesController@etapas')->name('proyecto.etapas.index');

//Análisis
Route::get('proyecto/{proyecto}/analisis', 'AnalisisController@show')->name('proyecto.analisis.show');
Route::get('proyecto/{proyecto}/analisis/edit', 'AnalisisController@edit')->name('proyecto.analisis.edit');
Route::patch('proyecto/{proyecto}/analisis/update', 'AnalisisController@edit')->name('proyecto.analisis.update');

//Diseño
Route::get('proyecto/{proyecto}/diseno', 'DisenosController@show')->name('proyecto.diseno.show');
Route::get('proyecto/{proyecto}/diseno/edit', 'DisenosController@edit')->name('proyecto.diseno.edit');
Route::patch('proyecto/{proyecto}/diseno/update', 'DisenosController@update')->name('proyecto.diseno.update');

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
