@extends('layouts.app')

@section('title', 'Instituições')

@section('content')

<div class="container">
    <h1>Detalhes da Instituição</h1>

    <p><strong>ID:</strong> {{ $instituicao->id }}</p>
    <p><strong>Nome:</strong> {{ $instituicao->nome }}</p>
    <p><strong>CNPJ:</strong> {{ $instituicao->cnpj }}</p>
    <p><strong>Email:</strong> {{ $instituicao->email ?? '-' }}</p>
    <p><strong>Telefone:</strong> {{ $instituicao->telefone ? '+55 ' . preg_replace('/(\d{2})(\d{4,5})(\d{4})/', '($1) $2-$3', $instituicao->telefone) : '-'}}</p>
    <p><strong>Descrição:</strong> {{ $instituicao->descricao ?? '-' }}</p>
    <p><strong>Endereço:</strong> {{ $instituicao->endereco ?? '-' }}</p>
    <p><strong>Responsável:</strong> {{ $instituicao->responsavel ?? '-' }}</p>

    <a href="{{ route($instituicao instanceof App\Models\Instituicao ? 'admin.instituicoes.aprovadas' : 'admin.instituicoes') }}" class="btn btn-secondary">Voltar</a>

</div>

@endsection
