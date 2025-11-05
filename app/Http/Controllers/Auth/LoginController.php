<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirecionamento após login
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Aqui você define a lógica de redirecionamento
        if (Auth::user()->is_admin) {
            return route('admin.dashboard'); // admin
        }

        return route('instituicoes.index'); // usuário comum
    }

    /**
     * Cria uma nova instância do controller
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
