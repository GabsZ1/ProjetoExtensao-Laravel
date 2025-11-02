@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="mb-4">Editar Instituição</h2>

            {{-- Mensagem de sucesso --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Mensagem de erros --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulário de edição --}}
            <form action="{{ route('admin.instituicoes.atualizar', $instituicao->id) }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $instituicao->nome) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $instituicao->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone', $instituicao->telefone) }}" required>
                </div>

                  <div class="mb-3">
                    <label for="descricao" class="form-label">CNPJ</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('cnjp', $instituicao->cnpj) }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="responsavel" class="form-label">Responsável</label>
                    <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ old('responsavel', $instituicao->responsavel) }}">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $instituicao->descricao) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $instituicao->endereco) }}">
                </div>

                {{-- Botões --}}
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    <a href="{{ route('admin.instituicoes.aprovadas') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
