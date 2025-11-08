<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstituicaoController extends Controller
{
    /**
     * Dashboard da instituição logada.
     * Mostra total de doações, valor arrecadado, quantidade de doadores e últimas doações.
     */

    //     public function index(){
    //         $instituicoes = Instituicao::get();
    //         return view('instituicoes.index', [
    //             'instituicoes' => $instituicoes
    //         ]);
    //     }

    public function dashboard()
    {
        $instituicao = auth()->user(); // Instância da Instituição logada

        // Contagem total de doações
        $totalDoacoes = $instituicao->doacoes()->count();

        // Soma do valor das doações
        $valorTotal = $instituicao->doacoes()->sum('valor');

        // Contagem de doadores distintos
        $doadores = $instituicao->doacoes()
            ->select('nome_doador', 'email_doador')
            ->distinct()
            ->get()
            ->count();

        // Últimas 5 doações
        $ultimasDoacoes = $instituicao->doacoes()->latest()->take(5)->get();

        return view('instituicoes.dashboard', compact(
            'instituicao',
            'totalDoacoes',
            'valorTotal',
            'doadores',
            'ultimasDoacoes'
        ));
    }

    /**
     * Cria uma nova instituição (registro).
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'nome' => 'required|string|max:255',
    //         'cnpj' => 'required|string|max:18|unique:instituicaos',
    //         'email' => 'required|email|unique:instituicaos',
    //         'password' => 'required|min:6|confirmed',
    //         'telefone' => 'required|string',
    //         'descricao' => 'required|string',
    //         'endereco' => 'required|string',
    //         'responsavel' => 'required|string',
    //     ]);

    //     $data['password'] = Hash::make($data['password']);

    //     Instituicao::create($data);

    //     return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    // }
}
