<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index(){
        $instituicoes = Instituicao::get();
        return view('instituicoes.index', [
            'instituicoes' => $instituicoes
        ]);
    }
}
