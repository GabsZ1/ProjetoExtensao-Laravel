<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">
    <title>Conexão Solidária</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- jQuery e máscaras -->
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/login" style="color: white;">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#formulario-cadastro" style="color: white;">Cadastrar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <script>
        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00');
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>

</body>

</html>