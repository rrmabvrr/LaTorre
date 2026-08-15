@extends('admin.app')

@section('title', 'Login Admin')

@push('head')
<style>
    .login-wrap {
        min-height: calc(100vh - 170px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px 0;
    }

    .login {
        width: 100%;
        max-width: 430px;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e8dfd2;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
        padding: 18px;
    }

    .login-logo-wrap {
        display: flex;
        justify-content: center;
        margin-bottom: 12px;
    }

    .login-logo {
        width: min(170px, 58vw);
        height: auto;
        display: block;
    }

    .login h1 {
        margin: 0 0 8px;
        font-size: 23px;
        line-height: 1.2;
        text-align: center;
    }

    .login p {
        color: #666;
        margin: 0 0 18px;
        font-size: 14px;
        text-align: center;
    }

    .login .field {
        display: grid;
        gap: 6px;
        margin-bottom: 14px;
    }

    .login label {
        font-weight: 600;
    }

    .login input {
        width: 100%;
        border: 1px solid #d8d0c3;
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        color: #555;
        font-size: 14px;
    }

    .remember input {
        width: 18px;
        height: 18px;
        margin: 0;
        padding: 0;
    }

    .login button {
        width: 100%;
        border: 0;
        border-radius: 10px;
        min-height: 46px;
        padding: 12px;
        font-weight: 700;
        font-size: 16px;
        background: #c43c1f;
        color: #fff;
        cursor: pointer;
    }

    .error {
        background: #fdeaea;
        border: 1px solid #f4c4c4;
        color: #8d1f1f;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 12px;
    }

    @media (min-width: 741px) {
        .login {
            border-radius: 16px;
            padding: 26px;
        }

        .login-logo-wrap {
            margin-bottom: 14px;
        }

        .login-logo {
            width: 185px;
        }

        .login h1 {
            font-size: 26px;
        }

        .login p {
            font-size: 15px;
        }
    }
</style>
@endpush

@section('content')
<div class="login-wrap">
    <form class="login" action="{{ route('admin.login.attempt') }}" method="POST">
        @csrf
        <div class="login-logo-wrap">
            <img class="login-logo" src="{{ asset('img/Logo_LaTorre.svg') }}" alt="La Torre">
        </div>
        <h1>Área Administrativa</h1>
        <p>Entre para gerenciar os itens do cardápio.</p>

        @if ($errors->any())
        <div class="error">E-mail ou senha inválidos.</div>
        @endif

        <div class="field">
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="field">
            <label for="password">Senha</label>
            <input id="password" type="password" name="password" required>
        </div>

        <label class="remember" for="remember">
            <input type="checkbox" id="remember" name="remember" value="1">
            Lembrar sessão
        </label>

        <button type="submit">Entrar</button>
    </form>
</div>
@endsection