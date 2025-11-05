<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se está autenticado no guard 'web'
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        $user = Auth::guard('web')->user();

        // Se for admin → permite acesso
        if ($user->is_admin) {
            return $next($request);
        }

        // Caso contrário, redireciona para o dashboard da instituição
        return redirect()->route('instituicao.dashboard');
    }
}
