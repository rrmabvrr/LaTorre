<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | La Torre</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: radial-gradient(circle at top right, #ffd4b8 0%, #f6f1ea 42%, #eae2d6 100%);
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        .login {
            width: min(420px, 92vw);
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e8dfd2;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
            padding: 26px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        p { color: #666; margin: 0 0 20px; }

        .field { display: grid; gap: 6px; margin-bottom: 14px; }

        label { font-weight: 600; }

        input {
            border: 1px solid #d8d0c3;
            border-radius: 10px;
            padding: 10px;
            font-size: 15px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            color: #555;
        }

        button {
            width: 100%;
            border: 0;
            border-radius: 10px;
            padding: 11px;
            font-weight: 700;
            font-size: 15px;
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
    </style>
</head>

<body>
    <form class="login" action="{{ route('admin.login.attempt') }}" method="POST">
        @csrf
        <h1>Area Administrativa</h1>
        <p>Entre para gerenciar os itens do cardapio.</p>

        @if ($errors->any())
            <div class="error">E-mail ou senha invalidos.</div>
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
            Lembrar sessao
        </label>

        <button type="submit">Entrar</button>
    </form>
</body>

</html>
