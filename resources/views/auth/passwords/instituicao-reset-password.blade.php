@extends('auth.layouts.auth')

@section('title', 'Redefinir Senha')

@section('content')
<div class="container-principal">
    <div class="card-auth">

        <!-- Lado esquerdo -->
        <div class="lado-esquerdo">
            <img src="{{ asset('images/conexao.png') }}" alt="Conexão Solidária">
        </div>

        <!-- Lado direito -->
        <div class="lado-direito">
            <h2 class="titulo mb-4 text-center">Redefinir Senha</h2>

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

            <form method="POST" action="{{ route('instituicao.password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email (readonly) -->
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        value="{{ old('email', $email ?? '') }}"
                        readonly
                        required>
                </div>

                <!-- Nova Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha</label>
                    <input
                        id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Digite sua nova senha"
                        required>
                </div>

                <!-- Confirmar Senha -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="Confirme sua nova senha"
                        required>
                </div>

                <!-- Botão -->
                <button type="submit" class="btn btn-auth w-100">Redefinir Senha</button>

                <!-- Link para login -->
                <p class="texto-link mt-3 text-center">
                    <a href="{{ route('login') }}">Voltar para login</a>
                </p>

            </form>
        </div>
    </div>
</div>
@endsection