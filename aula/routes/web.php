<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContatoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ROTAS PÚBLICAS
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/Contato', [ContatoController::class, 'exibirContato'])->name('contato');
Route::post('/Contato/inserir', [ContatoController::class, 'store'])->name('contato.store');

Route::get('/Login', function () { return view('Form'); })->name('login');
Route::post('/Login', [UsuarioController::class, 'fazerLogin'])->name('login.process');

Route::get('/Cadastro', [UsuarioController::class, 'exibirCadastro'])->name('cadastro');
Route::post('/Cadastro/inserir', [UsuarioController::class, 'store'])->name('cadastro.store');


// ROTAS PROTEGIDAS
Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [UsuarioController::class, 'fazerLogOut'])->name('fazerLogOut');

    // Rotas para TODOS os usuários logados
    Route::get('/Perfil', function () {
        return view('Perfil');
    })->name('perfil');
    Route::put('/perfil/foto', [UsuarioController::class, 'fotoPerfil'])->name('perfil.foto');

    // Rotas EXCLUSIVAS para Admin
    Route::middleware(['nivel:0'])->group(function () {
        Route::get('/Dashboard', [UsuarioController::class, 'dashboard'])->name('dashboard');
        Route::get('/Consultas', [UsuarioController::class, 'exibirConsultas'])->name('consultas');
        Route::get('/exercicio', [UsuarioController::class, 'exercicio'])->name('exercicio');
    });
});