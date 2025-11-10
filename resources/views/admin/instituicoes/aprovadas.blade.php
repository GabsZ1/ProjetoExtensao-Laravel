@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Instituições Aprovadas</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if($instituicoes->isEmpty())
        <p class="mt-3">Nenhuma instituição aprovada ainda.</p>
    @else
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Responsável</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instituicoes as $i)
                    <tr>
                        <td>{{ $i->nome }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $i->telefone }}</td>
                        <td>{{ $i->responsavel }}</td>
                        <td>{{ $i->cnpj }}</td>
                        <td>
                            <a href="{{ route('admin.instituicoes.show', $i->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('admin.instituicoes.editar', $i->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('admin.instituicoes.deletar', $i->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja remover esta instituição?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.instituicoes') }}" class="btn btn-secondary mt-3">Voltar para Pendentes</a>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Voltar para o Painel</a>
</div>
@endsection
