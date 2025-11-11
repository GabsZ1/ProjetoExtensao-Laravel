@extends('layouts.app')

@section('content')

<main style="background-color: #eaa029;">
    <div class="container col-10" style="background-color: #f8f7f2ff;">
        <div class="row">
            <div class="col-10 mx-auto">

                <!-- Introdução -->
                <section class="py-5 text-center">

                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <img src="{{ asset('images/logo-sem-fundo.png') }}" alt="Logo Conexão Solidária" style="height: 60px;">
                        <h1 class="display-4 fw-bold mb-0">Conexão Solidária</h1>
                    </div>

                    <p class="lead mb-4">
                        Cadastre sua instituição e organize suas doações de forma fácil e segura.
                    </p>

                    <a href="#formulario-cadastro" class="btn btn-primary btn-lg" style="background-color: #4935E3">
                        Cadastre sua instituição
                    </a>

                </section>

                <!-- Como Funciona -->
                <section class="py-5 text-center">
                    <h2 class="mb-4">Como funciona</h2>

                    <div class="row text-center">

                        <div class="col-md-4 mb-4">
                            <div class="p-3 rounded" style="border: 3px solid #0000002d;">
                                <i class="bi bi-pencil-square display-4 mb-3"></i>
                                <h5>Cadastro fácil</h5>
                                <p>Preencha seus dados e aguarde um retorno do admin.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="p-3 rounded" style="border: 3px solid #0000002d;">
                                <i class="bi bi-box-seam display-4 mb-3"></i>
                                <h5>Controle de doações</h5>
                                <p>Adicione, edite e consulte suas doações rapidamente.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="p-3 rounded" style="border: 3px solid #0000002d;">
                                <i class="bi bi-graph-up display-4 mb-3"></i>
                                <h5>Relatórios detalhados</h5>
                                <p>Tenha visibilidade de toda a sua arrecadação.</p>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- Mensagens -->
                @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Formulário -->
                <section id="formulario-cadastro" class="py-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10">

                                <h2 class="text-center mb-4">Cadastre sua instituição</h2>

                                <form action="{{ route('instituicoes_pendentes.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome da Instituição</label>
                                        <input type="text" name="nome" id="nome" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <input type="text" name="cnpj" id="cnpj" class="form-control" required maxlength="18">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-mail de Contato</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input type="text" name="telefone" id="telefone" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="responsavel" class="form-label">Nome do Responsável</label>
                                        <input type="text" name="responsavel" id="responsavel" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" name="endereco" id="endereco" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição da Instituição</label>
                                        <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required minlength="6">
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg" style="background-color: #4935E3">
                                            Enviar cadastro
                                        </button>
                                    </div>

                                    <p class="text-muted mt-2 small text-center">
                                        O admin analisará suas informações e entrará em contato.
                                    </p>

                                </form>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</main>

{{-- Máscaras automáticas --}}
<script>
    $(document).ready(function() {
        $('#cnpj').mask('00.000.000/0000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
</script>

@endsection