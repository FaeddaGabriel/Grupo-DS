<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Painel\DashboardController;
use App\Http\Controllers\Painel\ConsultasController;
use App\Http\Controllers\Painel\ExerciciosController;
use App\Http\Controllers\Usuario\PerfilController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rotas Públicas
Route::get("/", function () {
    return view("paginas.welcome");
})->name("home");

Route::get("/Contato", [ContatoController::class, "exibirContato"])->name(
    "contato",
);
Route::post("/Contato/inserir", [ContatoController::class, "store"])->name(
    "contato.store",
);

Route::get("/Login", [LoginController::class, "exibirLogin"])->name("login");
Route::post("/Login", [LoginController::class, "fazerLogin"])->name(
    "login.process",
);

Route::get("/Cadastro", [CadastroController::class, "exibirCadastro"])->name(
    "cadastro",
);
Route::post("/Cadastro/inserir", [CadastroController::class, "store"])->name(
    "cadastro.store",
);

// Rotas Protegidas
Route::middleware(["auth"])->group(function () {
    Route::post("/logout", [LoginController::class, "fazerLogOut"])->name(
        "fazerLogOut",
    );

    // Rotas para TODOS os usuários logados
    Route::get("/Perfil", [PerfilController::class, "exibirPerfil"])->name(
        "perfil",
    );
    Route::put("/perfil/foto", [PerfilController::class, "fotoPerfil"])->name(
        "perfil.foto",
    );

    // Rotas EXCLUSIVAS para Admin
    Route::middleware(["nivel:0"])->group(function () {
        Route::get("/Dashboard", [
            DashboardController::class,
            "dashboard",
        ])->name("dashboard");
        Route::get("/Consultas", [
            ConsultasController::class,
            "exibirConsultas",
        ])->name("consultas");
        Route::get("/exercicio", [
            ExerciciosController::class,
            "exercicio",
        ])->name("exercicio");
    });
});

// ROTAS DOS RELATÓRIOS - PDF
Route::get("/user-pdf", [RelatorioController::class, "userPdf"]);
Route::get("/Contato-pdf", [RelatorioController::class, "contatoPdf"]);

// ROTAS DOS RELATÓRIOS - CSV
Route::get("/user-csv", [RelatorioController::class, "userCsv"])->name(
    "user_csv.csv",
);
Route::get("/contato-csv", [RelatorioController::class, "contatoCsv"])->name(
    "contato_csv.csv",
);
