@extends('instituicoes.layouts.sidebar')

@section('title', 'Detalhes da Doação')

@section('content')

<div class="container py-4">
    <h1 class="mb-4">Detalhes da Doação</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $doacao->id }}</p>
            <p><strong>Doador:</strong> {{ $doacao->nome_doador }}</p>
            <p><strong>Telefone:</strong> {{ $doacao->telefone_doador ?? '-' }}</p>
            <p><strong>Email:</strong> {{ $doacao->email_doador ?? '-' }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($doacao->tipo) ?? '-' }}</p>
            <p><strong>Valor:</strong> 
                {{ $doacao->valor ? 'R$ ' . number_format($doacao->valor, 2, ',', '.') : '-' }}
            </p>
            <p><strong>Descrição:</strong> {{ $doacao->descricao ?? '-' }}</p>
            <p><strong>Data da Doação:</strong> {{ $doacao->data_doacao ? \Carbon\Carbon::parse($doacao->data_doacao)->format('d/m/Y') : '-' }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('doacoes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>

@endsection
