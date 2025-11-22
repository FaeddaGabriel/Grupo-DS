<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ContatoModel;

class ConsultasController extends Controller
{
    public function exibirConsultas()
    {
        $usuarios = User::all();
        $contatos = ContatoModel::all();
        return view("painel.consultas", compact("usuarios", "contatos"));
    }
}
