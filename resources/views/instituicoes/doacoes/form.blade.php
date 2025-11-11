@extends('instituicoes.layouts.sidebar')

@section('title', 'Salvar Doação')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Nova Doação</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($doacao) ? route('doacoes.update', $doacao->id) : route('doacoes.store') }}" method="POST">
        @csrf
        @if(isset($doacao))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome_doador" class="form-label">Nome do Doador</label>
            <input type="text" name="nome_doador" id="nome_doador" class="form-control"
                value="{{ old('nome_doador', $doacao->nome_doador ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email_doador" class="form-label">Email do Doador</label>
            <input type="email" name="email_doador" id="email_doador" class="form-control"
                value="{{ old('email_doador', $doacao->email_doador ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="telefone_doador" class="form-label">Telefone do Doador</label>
            <input type="text"
                name="telefone_doador"
                id="telefone_doador"
                class="form-control"
                value="{{ old('telefone_doador', $doacao->telefone_doador ?? '') }}">
        </div>


        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control"
                value="{{ old('valor', $doacao->valor ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Doação</label>
            <select name="tipo" id="tipo" class="form-control">
                @foreach(['dinheiro','alimento','roupa','brinquedo','higiene','eletronico','moveis','medicamentos','produtos_limpeza','equipamentos'] as $tipo)
                <option value="{{ $tipo }}" {{ (old('tipo', $doacao->tipo ?? '') == $tipo) ? 'selected' : '' }}>
                    {{ ucfirst($tipo) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3">{{ old('descricao', $doacao->descricao ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_doacao" class="form-label">Data da Doação</label>
            <input type="date" name="data_doacao" id="data_doacao" class="form-control"
                value="{{ old('data_doacao', $doacao->data_doacao ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($doacao) ? 'Atualizar' : 'Cadastrar' }}</button>
        <a href="{{ route('doacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

</div>

@endsection