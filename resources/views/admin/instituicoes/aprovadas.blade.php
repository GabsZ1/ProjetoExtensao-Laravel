@extends('admin.layouts.app')

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
                    <th>Status</th>
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
                            @if($i->is_active)
                                <span class="badge bg-success">Ativa</span>
                            @else
                                <span class="badge bg-secondary">Desativada</span>
                            @endif
                        </td>
                        <td>
                        
                            <a href="{{ route('admin.instituicoes.show', $i->id) }}" class="btn btn-sm btn-info">Ver</a>
                            
                            <a href="{{ route('admin.instituicoes.editar', $i->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            @if($i->is_active)
                                <form action="{{ route('admin.instituicoes.desativar', $i->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Deseja desativar esta instituição?')">Desativar</button>
                                </form>
                            @else
                                <form action="{{ route('admin.instituicoes.ativar', $i->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Deseja reativar esta instituição?')">Ativar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.instituicoes') }}" class="btn btn-secondary mt-3">Ir para Pendentes</a>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Voltar para o Painel</a>
</div>
@endsection
