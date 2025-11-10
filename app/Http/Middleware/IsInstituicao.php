<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsInstituicao
{
    public function handle(Request $request, Closure $next)
    {
        // Primeiro: instituição
        if (Auth::guard('instituicao')->check()) {
            return $next($request);
        }

        // Segundo: admin
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();

            if ($user && $user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
        }

        // Usuário não autenticado
        return redirect()->route('login');
    }
}
