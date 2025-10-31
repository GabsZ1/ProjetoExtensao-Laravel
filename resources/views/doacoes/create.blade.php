@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Doação</h1>

    <form action="{{ route('doacoes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="instituicao_id" class="form-label">Instituição</label>
            <select name="instituicao_id" id="instituicao_id" class="form-control" required>
                <option value="">Selecione...</option>
                @foreach($instituicoes as $instituicao)
                    <option value="{{ $instituicao->id }}">{{ $instituicao->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nome_doador" class="form-label">Nome do Doador</label>
            <input type="text" name="nome_doador" id="nome_doador" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email_doador" class="form-label">Email do Doador</label>
            <input type="email" name="email_doador" id="email_doador" class="form-control">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Doação</label>
            <input type="text" name="tipo" id="tipo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="data_doacao" class="form-label">Data da Doação</label>
            <input type="date" name="data_doacao" id="data_doacao" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('doacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
