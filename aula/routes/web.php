<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui registramos as rotas web da aplicação.
| Elas já são carregadas com o middleware 'web' que gerencia sessão, CSRF etc.
|
*/

// Página inicial pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Formulário de login (GET)
Route::get('/Login', function () {
    return view('Form');
})->name('login');

// Processa o login (POST)
Route::post('/Login', [UsuarioController::class, 'fazerLogin'])->name('login.process');

// Logout (POST)
Route::post('/logout', [UsuarioController::class, 'fazerLogOut'])->name('fazerLogOut');

// Cadastro de usuário (página e envio)
Route::get('/Cadastro', [UsuarioController::class, 'exibirCadastro'])->name('cadastro');
Route::post('/Cadastro/inserir', [UsuarioController::class, 'store'])->name('cadastro.store');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Página de consultas
    Route::get('/Consultas', [UsuarioController::class, 'exibirConsultas'])->name('consultas');
});

//Contato
Route::get('/Contato', 'App\Http\Controllers\ContatoController@exibirContato');
Route::post('/Contato/inserir', 'App\Http\Controllers\ContatoController@store');