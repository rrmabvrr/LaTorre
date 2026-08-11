<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | La Torre</title>
    <style>
        :root {
            --bg: #f6f6f1;
            --card: #ffffff;
            --text: #222;
            --accent: #c43c1f;
            --accent-strong: #9e2f17;
            --muted: #6b6b6b;
            --border: #e5e0d8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(180deg, #fdfcf8 0%, var(--bg) 100%);
            color: var(--text);
        }

        .container {
            width: min(1100px, 92vw);
            margin: 0 auto;
            padding: 24px 0 48px;
        }

        .topbar {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 12px 0;
        }

        .topbar-inner {
            width: min(1100px, 92vw);
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            font-weight: 700;
            font-size: 18px;
            text-decoration: none;
            color: var(--text);
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            border: 0;
            border-radius: 10px;
            padding: 10px 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #efefef;
            color: var(--text);
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover { background: var(--accent-strong); }

        .btn-danger {
            background: #b81f1f;
            color: #fff;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
        }

        .flash {
            background: #e7f8ee;
            color: #1f7a40;
            border: 1px solid #bee7cb;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 14px;
        }

        .error-box {
            background: #fdeaea;
            color: #8d1f1f;
            border: 1px solid #f4c4c4;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        th {
            font-size: 13px;
            letter-spacing: 0.03em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .grid {
            display: grid;
            gap: 12px;
        }

        .field {
            display: grid;
            gap: 6px;
        }

        label { font-weight: 600; }

        input, select, textarea {
            width: 100%;
            border: 1px solid #d9d4cb;
            border-radius: 10px;
            padding: 10px;
            font-size: 15px;
            font-family: inherit;
            background: #fff;
        }

        .muted { color: var(--muted); }

        .row-actions {
            display: flex;
            gap: 8px;
        }

        @media (max-width: 740px) {
            .table-wrap { overflow-x: auto; }
            .row-actions { flex-wrap: wrap; }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('admin.items.index') }}" class="brand">La Torre Admin</a>
            <div class="actions">
                <a class="btn" href="{{ route('menu.index') }}" target="_blank">Ver Cardapio</a>
                @auth
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button class="btn" type="submit">Sair</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <strong>Corrija os campos abaixo:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>

</html>
