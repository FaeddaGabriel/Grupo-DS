<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está logado e se o email é o do administrador.
        if (auth()->check() && auth()->user()->email === 'admin@gmail.com') {
            return $next($request);
        }

        // Caso não seja admin, redireciona para a página inicial ou para onde desejar.
        return redirect('/');
    }
}