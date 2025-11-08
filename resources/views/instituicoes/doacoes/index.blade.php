@extends('instituicoes.layouts.sidebar')

@section('title', 'Doações')

@section('content')

<div class="container py-4">
    <h1 class="mb-4">Lista de Doações</h1>

    <a href="{{ route('doacoes.create') }}" class="btn btn-primary mb-3">Nova Doação</a>


    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($doacoes->count())
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Doador</th>
                <th>Email do Doador</th>
                <th>Tipo</th>
                <th>Data</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doacoes as $doacao)
            <tr>
                <td>{{ $doacao->id }}</td>
                <td>{{ $doacao->nome_doador }}</td>
                <td>{{ $doacao->email_doador ?? '-' }}</td>
                <td>{{ ucfirst($doacao->tipo) ?? '-' }}</td>
                <td>{{ $doacao->data_doacao ? \Carbon\Carbon::parse($doacao->data_doacao)->format('d/m/Y') : '-' }}</td>
                <td>
                    <a href="{{ route('doacoes.show', $doacao->id) }}" class="btn btn-sm btn-info">Ver</a>

                    <a href="{{ route('doacoes.edit', $doacao->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('doacoes.destroy', $doacao->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta doação?')">Excluir</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">Nenhuma doação cadastrada.</div>
    @endif
</div>

@endsection