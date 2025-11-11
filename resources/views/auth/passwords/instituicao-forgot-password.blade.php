@extends('auth.layouts.auth')

@section('content')
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
@endsection