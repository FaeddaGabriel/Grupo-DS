<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckNivelAcesso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $role  // 0 = admin, 1 = usuário comum
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // se não estiver logado, manda pro login
        }

        if (Auth::user()->nivel_acesso != $role) {
            return redirect()->route('home'); // se não for o nível correto, manda pro home
        }

        return $next($request); // usuário autorizado
    }
}
