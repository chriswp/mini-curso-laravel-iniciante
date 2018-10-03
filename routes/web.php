<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/novo-contato', 'ContatoController@create')->name('contato.create');
    Route::post('/cadastrar-contato', 'ContatoController@store')->name('contato.store');
    Route::get('/contatos', 'ContatoController@index')->name('contato.index');
    Route::get('/contato/{id}', 'ContatoController@edit')->name('contato.edit');
    Route::put('/atualizar-contato/{id}', 'ContatoController@update')->name('contato.update');
    Route::delete('/remover-contato/{id}', 'ContatoController@destroy')->name('contato.destroy');


    Route::get('/contato-telefone/{contatoId}', 'TelefoneController@showByContato')->name('telefone.showByContato');
    Route::post('/cadastrar-telefone', 'TelefoneController@store')->name('telefone.store');
    Route::delete('/remover-telefone/{id}', 'TelefoneController@destroy')->name('telefone.destroy');

});
