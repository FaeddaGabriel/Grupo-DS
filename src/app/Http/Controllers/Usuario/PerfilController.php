<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function exibirPerfil()
    {
        return view("usuario.perfil");
    }

    public function fotoPerfil(Request $request)
    {
        $user = $request->user() ?? auth()->user();

        $request->validate([
            "foto" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $image = $request->file("foto");

        if ($image) {
            $path = $image->store("imagesPicture", "public");
            $user->foto_perfil = $path;
            $user->save();

            return redirect()
                ->route("perfil")
                ->with("success", "Modificações salvas com sucesso!");
        }

        return redirect()
            ->route("perfil")
            ->with("error", "Nenhuma imagem foi enviada.");
    }
}
