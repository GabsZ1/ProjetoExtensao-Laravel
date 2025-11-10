@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Instituição</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.instituicoes.atualizar', $instituicao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email', $instituicao->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CNPJ</label>
            <input name="cnpj" class="form-control" value="{{ old('cnpj', $instituicao->cnpj) }}">
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-success" type="submit">Salvar Alterações</button>
            <a href="{{ route('admin.instituicoes.aprovadas') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection
