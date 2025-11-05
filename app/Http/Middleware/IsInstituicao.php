<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsInstituicao
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está logado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verifica se NÃO é admin
        if (Auth::user()->is_admin) {
            // Se for admin, redireciona para o dashboard do admin
            return redirect()->route('admin.dashboard');
        }

        // Se chegou aqui, é instituição
        return $next($request);
    }
}
