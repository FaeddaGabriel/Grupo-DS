<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function exibirLogin()
    {
        return view("auth.login");
    }

    public function fazerLogin(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->nivel_acesso == 0) {
                return redirect()
                    ->route("dashboard")
                    ->with("success", "Login realizado com sucesso!");
            } else {
                return redirect("/")->with(
                    "success",
                    "Login realizado com sucesso!",
                );
            }
        }

        return redirect("/login")
            ->withErrors(["login" => "Credenciais inválidas."])
            ->withInput();
    }

    public function fazerLogOut(Request $request)
    {
        Auth::logout();
        return redirect("/")->with("success", "Logout realizado com sucesso!");
    }
}
