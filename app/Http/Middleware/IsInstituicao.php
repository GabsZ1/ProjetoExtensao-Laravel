<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsInstituicao
{
    public function handle(Request $request, Closure $next)
    {
        // 🔹 Se estiver autenticado como admin (guard web)
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();

            // Se for admin → redireciona para o dashboard do admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
        }

        // 🔹 Se estiver autenticado como instituição (guard instituicao)
        if (Auth::guard('instituicao')->check()) {
            return $next($request);
        }

        // 🔹 Caso não esteja autenticado em nenhum guard
        return redirect()->route('login');
    }
}
