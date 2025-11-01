<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>
    <body>
        <div class="container-principal">
            <div class="card-auth">

                {{-- Lado esquerdo com logo --}}
                <div class="lado-esquerdo">
                    <img src="{{ asset('images/conexao.png') }}" alt="Conexão Solidária">
                </div>

                {{-- Lado direito com formulário --}}
                <div class="lado-direito">
                    <h2 class="titulo">CADASTRAR INSTITUIÇÃO</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Nome --}}
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input id="nome" type="text"
                                class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('nome') }}" required autofocus>
                            @error('nome')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- CNPJ --}}
                        <div class="mb-3">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input id="cnpj" type="text"
                                class="form-control @error('cnpj') is-invalid @enderror"
                                name="cnpj" value="{{ old('cnpj') }}" required>
                            @error('cnpj')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- E-mail --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Telefone --}}
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input id="telefone" type="text"
                                class="form-control @error('telefone') is-invalid @enderror"
                                name="telefone" value="{{ old('telefone') }}" required>
                            @error('telefone')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Responsável --}}
                        <div class="mb-3">
                            <label for="responsavel" class="form-label">Responsável</label>
                            <input id="responsavel" type="text"
                                class="form-control @error('responsavel') is-invalid @enderror"
                                name="responsavel" value="{{ old('responsavel') }}" required>
                            @error('responsavel')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Descrição --}}
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror"
                                name="descricao" rows="3" required>{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- Endereço --}}
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input id="endereco" type="text"
                                class="form-control @error('endereco') is-invalid @enderror"
                                name="endereco" value="{{ old('endereco') }}" required>
                            @error('endereco')
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

                        {{-- Confirmar senha --}}
                        <div class="mb-4">
                            <label for="senha-confirm" class="form-label">Confirmar Senha</label>
                            <input id="senha-confirm" type="password"
                                class="form-control" name="senha_confirmation" required>
                        </div>

                        {{-- Botão de envio --}}
                        <button type="submit" class="btn-auth">
                            Cadastrar
                        </button>

                        <p class="texto-link">
                            Já possui uma conta? <a href="{{ route('login') }}">Entrar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>

    {{-- Máscaras automáticas --}}
    <script>
        $(document).ready(function() {
            $('#cnpj').mask('00.000.000/0000-00');
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</html>
