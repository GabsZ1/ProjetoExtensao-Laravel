<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">

    <title>Login</title>
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-principal">
        <div class="card-auth">

            {{-- Lado esquerdo com imagem/logo --}}
            <div class="lado-esquerdo">
                <img src="{{ asset('images/conexao.png') }}" alt="Conexão Solidária">
            </div>

            {{-- Lado direito com formulário --}}
            <div class="lado-direito">
                <h2 class="titulo">LOGIN DA INSTITUIÇÃO</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Senha --}}
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input id="senha" type="password"
                            class="form-control @error('senha') is-invalid @enderror"
                            name="senha" required>
                        @error('senha')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Lembrar de mim --}}
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Lembrar de mim</label>
                    </div>

                    {{-- Botão de login --}}
                    <button type="submit" class="btn-auth">
                        Entrar
                    </button>

                    {{-- Link para cadastro --}}
                    <p class="texto-link">
                        Ainda não possui conta?
                        <a href="{{ route('register') }}">Cadastre-se</a>
                    </p>

                    {{-- Link de recuperação de senha --}}
                    @if (Route::has('password.request'))
                    <p class="texto-link">
                        <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>

</html>