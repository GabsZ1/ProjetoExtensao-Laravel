@extends('layouts.instituicao')

@section('title', 'Doações')

@section('content')

<div class="container">
    <h1>Lista de Doações</h1>

    <a href="{{ route('doacoes.create') }}" class="btn btn-primary mb-3">Nova Doação</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($doacoes->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doador</th>
                    <th>Tipo</th>
                    <th>Instituição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doacoes as $doacao)
                    <tr>
                        <td>{{ $doacao->id }}</td>
                        <td>{{ $doacao->nome_doador }}</td>
                        <td>{{ $doacao->tipo ?? '-' }}</td>
                        <td>{{ $doacao->instituicao->nome ?? '—' }}</td>
                        <td>{{ $doacao->data_doacao ?? '-' }}</td>
                        <td>
                            <a href="{{ route('doacoes.show', $doacao->id) }}" class="btn btn-sm btn-info">Ver</a>

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
        <p>Nenhuma doação cadastrada.</p>
    @endif
</div>

@endsection
