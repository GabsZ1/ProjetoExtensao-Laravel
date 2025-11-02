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
        return view('admin.instituicoes.index', compact('pendentes')); // Passa as instituições pendentes para a view
    }

    public function aprovar($id)
    {
        $pendente = InstituicaoPendente::findOrFail($id);

        Instituicao::create([
            'nome' => $pendente->nome,
            'cnpj' => $pendente->cnpj,
            'email' => $pendente->email,
            'password' => Hash::make($senha), 
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

        $instituicao->update($data);// atualiza com os dados validados

        return redirect()->route('admin.instituicoes.aprovadas')->with('success', 'Instituição atualizada com sucesso!');
    }

    public function deletar($id)
    {
        $instituicao = Instituicao::findOrFail($id);
        $instituicao->delete();

        return redirect()->route('admin.instituicoes.aprovadas')->with('success', 'Instituição removida com sucesso!');
    }
}