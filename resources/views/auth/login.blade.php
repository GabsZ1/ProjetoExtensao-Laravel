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

                <!-- Botão -->
                <button type="submit" class="btn btn-auth w-100">Entrar</button>

                <!-- Link de recuperação -->
                @if (Route::has('password.request'))
                <p class="texto-link mt-3">
                    <a href="{{ route('instituicao.password.request') }}">Esqueci minha senha</a>
                </p>
                @endif

            </form>
        </div>
    </div>
</div>
@endsection