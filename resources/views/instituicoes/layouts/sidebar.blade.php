<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/logo-sem-fundo.png') }}" type="image/png">

    <title>Dashboard</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/dashboardInstituicao.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Sidebar fixa -->
    <div class="sidebar d-flex flex-column justify-content-between p-3 bg-light position-fixed" style="width: 250px; height: 100vh;">
        <div>
            <h2>Painel</h2>
            <a href="{{ route('instituicoes.index') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('doacoes.create') }}" class="nav-link">Nova Doação</a>
            <a href="{{ route('doacoes.index') }}" class="nav-link">Minhas Doações</a>
        </div>

        <form id="logout-form" action="{{ route('instituicao.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 mt-3">
                Sair
            </button>
        </form>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content" style="margin-left: 250px; padding: 2rem;">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#telefone_doador').mask('(00) 00000-0000');
        });
    </script>


</body>

</html>