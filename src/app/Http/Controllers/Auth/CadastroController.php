<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function exibirCadastro()
    {
        return view("auth.cadastro");
    }

    public function store(Request $request)
    {
        $request->validate([
            "txNome" => "required|string|max:255",
            "txEmail" => "required|string|email|max:255|unique:users,email",
            "txSenha" => "required|string|min:3",
            "txSexo" => "required|string",
        ]);

        User::create([
            "name" => $request->txNome,
            "email" => $request->txEmail,
            "sexo" => $request->txSexo,
            "password" => Hash::make($request->txSenha),
            "nivel_acesso" => 1,
        ]);

        return redirect()
            ->route("login")
            ->with("success", "Cadastro realizado com sucesso! Faça login.");
    }
}
