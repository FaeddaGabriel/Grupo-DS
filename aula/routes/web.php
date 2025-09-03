<?php

use Illuminate\Support\Facades\Route;

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

/* Rota antiga (não funciona o CRUD)

Route::get('/Cadastro', function () {
    return view('Cadastro');
});*/

Route::get('/Form', function () {
    return view('Form');
});

Route::get('/', function () {
    return view('welcome');
});

/* Rota antiga (não funciona o CRUD)

Route::get('/Contato', function () {
    return view('Contato');
});*/

Route::get('/NavBar', function () {
    return view('NavBar');
});

Route::get('/Loja', function () {
    return view('Loja');
});
//Exemplo PLaylist alan
Route::get('/Nome','App\Http\Controllers\NomeController@index');

Route::get('/Nome-view','App\Http\Controllers\NomeController@exibirNome');

Route::post('/Nome/inserir','App\Http\Controllers\NomeController@store');
//CRUD no site
//Cadastro
Route::get('/Cadastro','App\Http\Controllers\CadastroController@exibirCadastro');

Route::post('/Cadastro/inserir','App\Http\Controllers\CadastroController@store');
//Contato
Route::get('/Contato','App\Http\Controllers\ContatoController@exibirContato');

Route::post('/Contato/inserir','App\Http\Controllers\ContatoController@store');
//Consultas
Route::get('/Consultas', 'App\Http\Controllers\CadastroController@exibirConsultas');
