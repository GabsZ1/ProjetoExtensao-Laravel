<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Notifications\ResetPasswordInstituicao;

class InstituicaoForgotPasswordController extends Controller
{
    // Trait do Laravel que já contém a lógica padrão de envio de reset de senha.
    use SendsPasswordResetEmails;

    // Define que o "broker" que será usado para gerar e validar tokens de recuperação será 'instituicaos'
    public function broker()
    {
        return Password::broker('instituicaos');
    }

    // Exibe o formulário onde a instituição digita o email para recuperar a senha
    public function showLinkRequestForm()
    {
        return view('auth.passwords.instituicao-forgot-password');
    }

    // Envia o email com o link de redefinição de senha
    protected function sendResetLinkEmail(Request $request)
    {
        // Valida o email informado
        $request->validate(['email' => 'required|email']);

        // Procura a instituição no banco pelo email enviado
        $user = \App\Models\Instituicao::where('email', $request->email)->first();

        // Caso não exista, retorna erro
        if (! $user) {
            return back()->withErrors(['email' => trans(Password::INVALID_USER)]);
        }

        // Cria o token de redefinição utilizando o broker 'instituicaos'
        $token = Password::broker('instituicaos')->createToken($user);

        // Envia notificação customizada com o link de reset
        $user->notify(new ResetPasswordInstituicao($token));

        // Mensagem de sucesso
        return back()->with('success', 'Enviamos um link para redefinir sua senha.');
    }
}
