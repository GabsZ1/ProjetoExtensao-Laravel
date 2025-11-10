<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">

    <title>Conexão Solidária</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- máscara automática no preenchimento (CNPJ e TELEFONE) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #4935E3;">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center">

                <img src="{{ asset('images/logo-sem-fundo.png') }}" alt="Logo MeuSite" width="30" height="30" class="me-2">

                <strong style="color: white;">Conexão Solidária</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="color: white;">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formulario-cadastro" style="color: white;">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                    <!-- Formulário de Cadastro -->
                    <section id="formulario-cadastro" class="py-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-10">
                                    <h2 class="text-center mb-4">Cadastre sua instituição</h2>
                                    <form action="{{ route('instituicoes_pendentes.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome da Instituição</label>
                                            <input type="text" name="nome" class="form-control" id="nome" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cnpj" class="form-label">CNPJ</label>
                                            <input type="text" name="cnpj" class="form-control" id="cnpj" required maxlength="18">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail de Contato</label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <input type="text" name="telefone" class="form-control" id="telefone" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="responsavel" class="form-label">Nome do Responsável</label>
                                            <input type="text" name="responsavel" class="form-control" id="responsavel" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="endereco" class="form-label">Endereço</label>
                                            <input type="text" name="endereco" class="form-control" id="endereco" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descricao" class="form-label">Descrição da Instituição</label>
                                            <textarea name="descricao" class="form-control" id="descricao" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Senha</label>
                                            <input type="password" name="password" class="form-control" id="password" required minlength="6">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required minlength="6">
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #4935E3">Enviar cadastro</button>
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
</body>

{{-- Máscaras automáticas --}}
<script>
    $(document).ready(function() {
        $('#cnpj').mask('00.000.000/0000-00');
        $('#telefone').mask('(00) 00000-0000');
    });
</script>

</html>