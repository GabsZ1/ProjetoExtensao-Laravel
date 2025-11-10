<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // o caminho da sua view de login
    }

    /**
     * Função personalizada de login
     */
    public function login(Request $request)
    {
        // Valida o formulário de login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 1️⃣ Tenta autenticar usando o guard 'web' (usuário/admin)
        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();

            // Se for admin → dashboard do admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            // Se for usuário comum → dashboard de instituição (ou outro local)
            return redirect()->route('instituicoes.index');
        }

        // 2️⃣ Tenta autenticar usando o guard 'instituicao' (tabela instituicaos)
        if (Auth::guard('instituicao')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $inst = Auth::guard('instituicao')->user();

            if (! $inst->is_active) {
                Auth::guard('instituicao')->logout();
                return back()->withErrors([
                    'email' => 'Sua instituição foi desativada pelo administrador.'
                ])->onlyInput('email');
            }

            return redirect()->route('instituicoes.index');
        }


        // 3️⃣ Se não encontrar em nenhum dos guards
        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    /**
     * Logout personalizado — encerra sessão em ambos os guards
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function logoutInstituicao(Request $request)
{
    Auth::guard('instituicao')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

        return redirect()->route('login');
}


    /**
     * Middleware de autenticação
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
