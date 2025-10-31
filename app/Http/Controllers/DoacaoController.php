<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    public function index()
    {
        // Lista todas as doações com suas respectivas instituições
        $doacoes = Doacao::with('instituicao')->get();

        return view('doacoes.index', [
            'doacoes' => $doacoes
        ]);
    }

    public function create()
    {
        // Lista instituições para o select na criação de doações
        $instituicoes = Instituicao::all();

        return view('doacoes.create', [
            'instituicoes' => $instituicoes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'instituicao_id' => 'required|exists:instituicaos,id',
            'nome_doador' => 'required|string|max:255',
        ]);

        $dados = $request->except('_token');

        Doacao::create($dados);

        return redirect('/doacoes')->with('success', 'Doação cadastrada com sucesso!');
    }

    public function show($id)
    {
        $doacao = Doacao::with('instituicao')->findOrFail($id);

        return view('doacoes.show', [
            'doacao' => $doacao
        ]);
    }

    public function destroy($id)
    {
        $doacao = Doacao::findOrFail($id);
        $doacao->delete();

        return redirect()->route('doacoes.index')->with('success', 'Doação removida com sucesso!');
    }
}
