<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoacaoController extends Controller
{
    // Lista apenas as doações da instituição logada
    public function index()
    {
        $doacoes = Doacao::where('instituicao_id', Auth::guard('instituicao')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('instituicoes.doacoes.index', compact('doacoes'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('instituicoes.doacoes.form');
    }

    // Salva uma nova doação
    public function store(Request $request)
    {
        $request->validate([
            'nome_doador' => 'required|string|max:255',
            'email_doador' => 'nullable|email|max:255',
            'telefone_doador' => 'nullable|string|max:20',
            'valor' => 'nullable|numeric',
            'tipo' => 'required|string',
            'descricao' => 'nullable|string',
            'data_doacao' => 'nullable|date',
        ]);

        Doacao::create([
            'instituicao_id' => Auth::guard('instituicao')->id(), // atribui automaticamente a instituição logada
            'nome_doador' => $request->nome_doador,
            'email_doador' => $request->email_doador,
            'telefone_doador' => $request->telefone_doador,
            'valor' => $request->valor,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'data_doacao' => $request->data_doacao,
        ]);

        return redirect()->route('doacoes.index')->with('success', 'Doação cadastrada com sucesso!');
    }

    // Mostra detalhes da doação
    public function show($id)
    {
        $doacao = Doacao::where('instituicao_id', Auth::guard('instituicao')->id())
            ->findOrFail($id);

        return view('instituicoes.doacoes.show', compact('doacao'));
    }

    // Remove a doação
    public function destroy($id)
    {
        $doacao = Doacao::where('instituicao_id', Auth::guard('instituicao')->id())
            ->findOrFail($id);

        $doacao->delete();

        return redirect()->route('doacoes.index')->with('success', 'Doação removida com sucesso!');
    }

    public function edit($id)
    {
        $doacao = Doacao::findOrFail($id);
        return view('instituicoes.doacoes.form', [
            'doacao' => $doacao
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_doador' => 'required|string|max:255',
            'tipo' => 'required|string',
        ]);

        $doacao = Doacao::findOrFail($id);

        $dados = $request->except('_token', '_method');
        $doacao->update($dados);

        return redirect()->route('doacoes.index')->with('success', 'Doação atualizada com sucesso!');
    }
}
