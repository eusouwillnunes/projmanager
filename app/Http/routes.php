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

Route::group(['prefix'=>'client'], function (){
    //Rota para a obtenção todos os registros da Entidade Client
    Route::get('/', 'ClientController@index');
//Rota para a obtenção de um registro correspondente da Entidade Client
    Route::get('/{id}', 'ClientController@show');
//Rota para a inserção de um registro da Entidade Client
    Route::post('/', 'ClientController@store');
//Rota para a atualização de um registro da Entidade Client
    Route::put('/{id}', 'ClientController@update');
//Rota para a exclusão de um registro da Entidade Client
    Route::delete('/{id}', 'ClientController@destroy');
});

Route::group(['prefix'=>'project'], function (){
    //Rota para a obtenção todos os registros da Entidade Project
    Route::get('/', 'ProjectController@index');
//Rota para a obtenção de um registro correspondente da Entidade Project
    Route::get('/{id}', 'ProjectController@show');
//Rota para a inserção de um registro da Entidade Project
    Route::post('/', 'ProjectController@store');
//Rota para a atualização de um registro da Entidade Project
    Route::put('/{id}', 'ProjectController@update');
//Rota para a exclusão de um registro da Entidade Project
    Route::delete('/{id}', 'ProjectController@destroy');
});