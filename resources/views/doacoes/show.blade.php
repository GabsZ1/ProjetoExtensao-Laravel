@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Doação</h1>

    <p><strong>ID:</strong> {{ $doacao->id }}</p>
    <p><strong>Doador:</strong> {{ $doacao->nome_doador }}</p>
    <p><strong>Email:</strong> {{ $doacao->email_doador ?? '-' }}</p>
    <p><strong>Tipo:</strong> {{ $doacao->tipo ?? '-' }}</p>
    <p><strong>Valor:</strong> {{ $doacao->valor ? 'R$ ' . number_format($doacao->valor, 2, ',', '.') : '-' }}</p>
    <p><strong>Descrição:</strong> {{ $doacao->descricao ?? '-' }}</p>
    <p><strong>Data da Doação:</strong> {{ $doacao->data_doacao ?? '-' }}</p>
    <p><strong>Instituição:</strong> {{ $doacao->instituicao->nome ?? '-' }}</p>

    <a href="{{ route('doacoes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
