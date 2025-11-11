<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">
    <title>@yield('title', 'Login')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS específico do auth -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <!-- jQuery (se precisar) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <!-- NAVBAR DO AUTH -->
    <nav class="navbar navbar-expand-lg" style="background-color: #4935E3;">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/logo-sem-fundo.png') }}" alt="Logo" width="30" height="30" class="me-2">
                <strong style="color: white;">Conexão Solidária</strong>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    {{-- Link para login --}}
                    @if(!Request::is('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                    </li>
                    @endif

                    {{-- Link para cadastro --}}
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#formulario-cadastro">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>