@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Instituições Pendentes</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if($pendentes->isEmpty())
        <p class="mt-3">Nenhuma instituição pendente no momento.</p>
    @else
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Responsável</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendentes as $inst)
                    <tr>
                        <td>{{ $inst->nome }}</td>
                        <td>{{ $inst->cnpj }}</td>
                        <td>{{ $inst->email }}</td>
                        <td>{{ $inst->telefone }}</td>
                        <td>{{ $inst->responsavel }}</td>
                        <td>
                            <form action="{{ route('admin.instituicoes.aprovar', $inst->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                            </form>

                            <form action="{{ route('admin.instituicoes.rejeitar', $inst->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Rejeitar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Voltar para o Painel</a>
    
</div>
@endsection
