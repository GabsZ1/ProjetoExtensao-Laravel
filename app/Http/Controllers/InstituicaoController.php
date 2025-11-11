<?php

namespace App\Http\Controllers;

class InstituicaoController extends Controller
{
    /**
     * Dashboard da instituição logada.
     * Mostra total de doações, valor arrecadado, quantidade de doadores e últimas doações.
     */
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
}
