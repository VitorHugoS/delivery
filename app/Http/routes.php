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

Route::any('/', 'WelcomeController@index');
Route::get('/pizzas', 'WelcomeController@index');
Route::get('/pizza/{item}', 'WelcomeController@pizza');
Route::any('/fecharPedido', 'WelcomeController@fecharPedido');
Route::any('/pedir', 'WelcomeController@resumo');
Route::get('/finalizar', 'WelcomeController@finalizar');
Route::get('/carrinho', 'WelcomeController@carrinho');
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


