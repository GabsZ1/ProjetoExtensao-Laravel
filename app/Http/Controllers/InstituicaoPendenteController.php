<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstituicaoPendente;

class InstituicaoPendenteController extends Controller
{
    // Método para salvar o cadastro enviado pelo formulário
    public function store(Request $request)
    {
        // Validação básica dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:instituicao_pendentes,cnpj',
            'email' => 'required|email|unique:instituicao_pendentes,email',
            'telefone' => 'required|string|max:20',
            'descricao' => 'required|string',
            'endereco' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
        ]);

        // Cria o registro
        InstituicaoPendente::create($request->all());

        // Redireciona de volta com mensagem de sucesso
        return redirect()->back()->with('success', 'Cadastro enviado com sucesso! O admin irá analisá-lo.');
    }
}
