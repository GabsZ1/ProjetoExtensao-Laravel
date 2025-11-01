<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstituicaoController extends Controller
{
    public function index(){
        $instituicoes = Instituicao::get();
        return view('instituicoes.index', [
            'instituicoes' => $instituicoes
        ]);
    }

    public function create(){
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14|unique:instituicaos',
            'email' => 'required|email|unique:instituicaos',
            'password' => 'required|min:6|confirmed',
            'telefone' => 'required|string',
            'descricao' => 'required|string',
            'endereco' => 'required|string',
            'responsavel' => 'required|string',
        ]);

        $data['password'] = Hash::make($data['password']);

        Instituicao::create($data);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }
}
