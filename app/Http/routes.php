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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['checkRoute', 'auth']], function () {
	Route::get('app/profile', 'Admin\\UsuariosController@me');
	Route::get('app/profile/edit', 'Admin\\UsuariosController@editProfile');
	Route::put('app/profile', 'Admin\\UsuariosController@updateProfile');
	Route::resource('app/usuarios', 'Admin\\UsuariosController');
	Route::resource('app/projetos', 'Admin\\ProjetosController');
	Route::resource('app/criancas', 'Admin\\CriancasController');
	Route::resource('app/chamadas', 'Admin\\ChamadasController');
	Route::put('app/fazer_chamda/chamada/{id}', 'Admin\\ChamadasController@fazer_chamada');
});