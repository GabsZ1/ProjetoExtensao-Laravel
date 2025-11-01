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
<body>
    <div class="sidebar">
        <h2>Painel</h2>
        <a href="{{ route('instituicoes.index') }}">Dashboard</a>
        <a href="{{ route('doacoes.create') }}">Nova Doação</a>
        <a href="{{ route('doacoes.index') }}">Minhas Doações</a>
        <a href="{{ route('logout') }}">Sair</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
