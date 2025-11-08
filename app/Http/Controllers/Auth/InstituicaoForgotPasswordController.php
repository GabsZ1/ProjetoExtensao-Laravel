<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Notifications\ResetPasswordInstituicao;

class InstituicaoForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function broker()
    {
        return Password::broker('instituicaos');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.instituicao-forgot-password');
    }

    protected function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Buscar instituição
        $user = \App\Models\Instituicao::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => trans(Password::INVALID_USER)]);
        }

        // ✅ Criar token usando a façade Password
        $token = Password::broker('instituicaos')->createToken($user);

        // ✅ Enviar notificação customizada
        $user->notify(new ResetPasswordInstituicao($token));

        return back()->with('success', 'Enviamos um link para redefinir sua senha.');
    }
}
