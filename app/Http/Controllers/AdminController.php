<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\InstituicaoPendente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function instituicoesPendentes()
    {
        $pendentes = InstituicaoPendente::all();
        return view('admin.instituicoes.index', compact('pendentes'));
    }

    public function aprovar($id)
    {
        $pendente = InstituicaoPendente::findOrFail($id);

        Instituicao::create([
            'nome' => $pendente->nome,
            'cnpj' => $pendente->cnpj,
            'email' => $pendente->email,
            'password' => $pendente->password,
            'telefone' => $pendente->telefone,
            'descricao' => $pendente->descricao,
            'endereco' => $pendente->endereco,
            'responsavel' => $pendente->responsavel,
        ]);

        $pendente->delete();

        return back()->with('success', 'Instituição aprovada com sucesso!');
    }

    public function rejeitar($id)
    {
        $pendente = InstituicaoPendente::findOrFail($id);
        $pendente->delete();

        return back()->with('success', 'Instituição rejeitada e removida.');
    }

    public function instituicoesAprovadas()
    {
        $instituicoes = Instituicao::all();
        return view('admin.instituicoes.aprovadas', compact('instituicoes'));
    }

    public function editar($id)
    {
        $instituicao = Instituicao::findOrFail($id);
        return view('admin.instituicoes.editar', compact('instituicao'));
    }

    public function atualizar(Request $request, $id)
    {
        $instituicao = Instituicao::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'descricao' => 'nullable|string',
            'endereco' => 'nullable|string',
            'responsavel' => 'nullable|string',
        ]);

        $instituicao->update($data);

        return redirect()->route('admin.instituicoes.aprovadas')->with('success', 'Instituição atualizada com sucesso!');
    }

    // Desativa a instituição
    public function desativar($id)
    {
        $instituicao = Instituicao::findOrFail($id);
        $instituicao->update(['is_active' => false]);

        return redirect()->route('admin.instituicoes.aprovadas')->with('success', 'Instituição desativada com sucesso!');
    }

    // Reativa a instituição
    public function ativar($id)
    {
        $instituicao = Instituicao::findOrFail($id);
        $instituicao->update(['is_active' => true]);

        return redirect()->route('admin.instituicoes.aprovadas')->with('success', 'Instituição ativada com sucesso!');
    }
}
