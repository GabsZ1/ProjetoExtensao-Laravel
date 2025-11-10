<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">
    <title>Recuperar Senha</title>

    <!-- Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

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
                        <a class="nav-link" href="/#formulario-cadastro" style="color: white;">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-principal">
        <div class="card-auth">

            <!-- Lado esquerdo -->
            <div class="lado-esquerdo">
                <img src="{{ asset('images/conexao.png') }}" alt="Conexão Solidária">
            </div>

            <!-- Lado direito -->
            <div class="lado-direito">
                <h2 class="titulo mb-4 text-center">Esqueci minha Senha</h2>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('instituicao.password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                            id="email"
                            type="email"
                            class="form-control"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Digite seu e-mail"
                            required>
                    </div>

                    <!-- Botão -->
                    <button type="submit" class="btn btn-auth w-100">Enviar link de recuperação</button>

                    <!-- Link para login -->
                    <p class="texto-link mt-3 text-center">
                        <a href="{{ route('login') }}">Voltar para login</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>