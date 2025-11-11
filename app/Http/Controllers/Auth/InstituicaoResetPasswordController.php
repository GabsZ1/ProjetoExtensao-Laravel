<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\Instituicao;

class InstituicaoResetPasswordController extends Controller
{
    // Para onde redirecionar após o reset de senha.
    protected $redirectTo = '/login';

    // Mostra o formulário de reset de senha.
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.instituicao-reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    // Realiza o reset da senha.
    public function reset(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Reset manual usando o broker 'instituicaos'
        $status = Password::broker('instituicaos')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Instituicao $user, $password) {
                $user->password = bcrypt($password);
                $user->save(); // senha atualizada
                // XXXXX Não loga automaticamente
            }
        );

        // Retorna sucesso ou erro
        return $status == Password::PASSWORD_RESET
            ? redirect($this->redirectTo)->with('success', 'Senha redefinida com sucesso! Agora faça login.')
            : back()->withErrors(['email' => __($status)]);
    }
}
