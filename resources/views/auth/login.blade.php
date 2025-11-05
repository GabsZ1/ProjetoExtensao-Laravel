<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">
    <title>Login</title>

    <!-- Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Seu CSS -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                <h2 class="titulo mb-4 text-center">LOGIN</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Lembrar de mim -->
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Lembrar de mim</label>
                    </div>

                    <!-- Botão -->
                    <button type="submit" class="btn btn-auth w-100">Entrar</button>

                    <!-- Link de recuperação -->
                    @if (Route::has('password.request'))
                    <p class="texto-link mt-3">
                        <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </p>
                    @endif

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, apenas se quiser usar componentes dinâmicos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
