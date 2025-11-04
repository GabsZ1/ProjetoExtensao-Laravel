@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Painel de Administração</h1>
    <p>Gerencie aqui as Instituições que utilizam o sistema!</p>

    <div class="mt-4">
        <div class="row">
            {{-- Card Pendentes --}}
            <div class="col-md-6 mb-3">
                <div class="card border-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title">Instituições Pendentes</h5>
                        <p class="card-text">Veja todas as instituições que aguardam aprovação.</p>
                        <a href="{{ route('admin.instituicoes') }}" class="btn btn-primary">Ver Pendentes</a>
                    </div>
                </div>
            </div>

            {{-- Card Aprovadas --}}
            <div class="col-md-6 mb-3">
                <div class="card border-success h-100">
                    <div class="card-body">
                        <h5 class="card-title">Instituições Aprovadas</h5>
                        <p class="card-text">Gerencie todas as instituições aprovadas.</p>
                        <a href="{{ route('admin.instituicoes.aprovadas') }}" class="btn btn-success">Ver Aprovadas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
