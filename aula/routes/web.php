<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui registramos as rotas web da aplicação.
|
*/

// Página inicial pública
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Contato público
Route::get('/Contato', function () {
    return view('Contato');
})->name('Contato');

// Formulário de login (GET)
Route::get('/Login', function () {
    return view('Form');
})->name('login');

// Perfil público
Route::get('/Perfil', function () {
    return view('Perfil');
})->name('Perfil');

// Processa o login (POST)
Route::post('/Login', [UsuarioController::class, 'fazerLogin'])->name('login.process');

// Logout (POST)
Route::post('/logout', [UsuarioController::class, 'fazerLogOut'])->name('fazerLogOut');

// Cadastro de usuário (página e envio)
Route::get('/Cadastro', [UsuarioController::class, 'exibirCadastro'])->name('cadastro');
Route::post('/Cadastro/inserir', [UsuarioController::class, 'store'])->name('cadastro.store');

// Rotas protegidas por autenticação e nível de acesso
Route::middleware(['auth', 'nivel:0'])->group(function () {
    // Página de consultas só para o admin
    Route::get('/Consultas', [UsuarioController::class, 'exibirConsultas'])->name('consultas');

// Dashboard do admin
Route::get('/Dashboard', [UsuarioController::class, 'dashboard'])
    ->name('dashboard');
});

// Rotas protegidas por autenticação e nível de acesso (usuário comum)
Route::middleware(['auth', 'nivel:1'])->group(function () {
    // Página inicial protegida para usuário comum
    Route::get('/home', function () {
        return view('welcome');
    })->name('home.protected');

    // Perfil do usuário
    Route::get('/Perfil', function () {
        return view('Perfil');
    })->name('perfil');

    // Atualização da foto de perfil
    Route::put('/perfil/foto', [UsuarioController::class, 'fotoPerfil'])
        ->name('perfil.foto');
});

// Contato
Route::get('/Contato', 'App\Http\Controllers\ContatoController@exibirContato');
Route::post('/Contato/inserir', 'App\Http\Controllers\ContatoController@store');
