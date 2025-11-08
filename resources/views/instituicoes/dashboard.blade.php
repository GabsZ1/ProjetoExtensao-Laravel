@extends('instituicoes.layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Bem-vindo, {{ $instituicao->nome }}</h1>

    <!-- Resumo -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5>Total de Doações</h5>
                    <h2>{{ $totalDoacoes }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5>Valor Total (R$)</h5>
                    <h2>{{ number_format($valorTotal, 2, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5>Total de Doadores</h5>
                    <h2>{{ $doadores }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimas doações -->
    <h3>Últimas Doações</h3>
    @if($ultimasDoacoes->count())
        <table class="table table-bordered mt-2">
            <thead class="table-light">
                <tr>
                    <th>Nome Doador</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ultimasDoacoes as $doacao)
                <tr>
                    <td>{{ $doacao->nome_doador }}</td>
                    <td>{{ $doacao->tipo ?? '-' }}</td>
                    <td>{{ $doacao->valor ? 'R$ ' . number_format($doacao->valor, 2, ',', '.') : '-' }}</td>
                    <td>{{ $doacao->data_doacao ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma doação cadastrada ainda.</p>
    @endif

    <!-- Ações rápidas -->
    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('doacoes.create') }}" class="btn btn-primary">Nova Doação</a>
        <a href="{{ route('doacoes.index') }}" class="btn btn-secondary">Ver Todas Doações</a>
    </div>
</div>
@endsection
