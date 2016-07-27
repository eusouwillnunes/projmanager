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

//Rota para a obtenção todos os registros da Entidade Client
Route::get('client', 'ClientController@index');
//Rota para a obtenção de um registro correspondente da Entidade Client
Route::get('client/{id}', 'ClientController@show');
//Rota para a inserção de um registro da Entidade Client
Route::post('client', 'ClientController@store');
//Rota para a atualização de um registro da Entidade Client
Route::put('client/{id}', 'ClientController@update');
//Rota para a exclusão de um registro da Entidade Client
Route::delete('client/{id}', 'ClientController@destroy');