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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(180deg, #fdfcf8 0%, var(--bg) 100%);
            color: var(--text);
        }

        .container {
            width: min(1100px, 94vw);
            margin: 0 auto;
            padding: 16px 0 32px;
        }

        .topbar {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 12px 0;
        }

        .topbar-inner {
            width: min(1100px, 94vw);
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }

        .brand {
            font-weight: 700;
            font-size: 18px;
            text-decoration: none;
            color: var(--text);
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .brand-logo {
            width: 34px;
            height: 34px;
            display: block;
        }

        .actions {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }

        .actions form {
            width: 100%;
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
            width: 100%;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--accent-strong);
        }

        .btn-success {
            background: #1f7a40;
            color: #fff;
        }

        .btn-success:hover {
            background: #176132;
        }

        .btn-danger {
            background: #b81f1f;
            color: #fff;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px;
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

        th,
        td {
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

        label {
            font-weight: 600;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d9d4cb;
            border-radius: 10px;
            padding: 10px;
            font-size: 15px;
            font-family: inherit;
            background: #fff;
        }

        .muted {
            color: var(--muted);
        }

        .row-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .row-actions form {
            width: 100%;
        }

        .row-actions .btn {
            width: 100%;
        }

        .page-head {
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .mobile-list {
            display: grid;
            gap: 10px;
        }

        .item-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 12px;
            background: #fff;
        }

        .item-card-head {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 8px;
        }

        .item-card-title {
            margin: 0;
            font-size: 16px;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .item-meta {
            margin: 0;
            display: grid;
            gap: 4px;
            font-size: 14px;
        }

        .texto-curto {
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
        }

        .sizes-preview,
        .truncated-text,
        .price-preview {
            display: block;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-card-head {
            flex-wrap: wrap;
        }

        .desktop-only {
            display: none;
        }

        .mobile-only {
            display: block;
        }

        .actions-inline {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pagination-wrap {
            margin-top: 14px;
            display: grid;
            gap: 10px;
        }

        .pagination-mobile {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 8px;
        }

        .pagination-mobile .btn {
            min-height: 40px;
        }

        .pagination-status {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
            font-weight: 600;
        }

        .pagination-desktop {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 10px;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            text-decoration: none;
            font-weight: 600;
            color: var(--text);
            background: #fff;
        }

        .page-link.active {
            border-color: var(--accent);
            background: var(--accent);
            color: #fff;
        }

        .page-link.disabled {
            opacity: 0.5;
            pointer-events: none;
            background: #f2efe9;
        }

        @media (max-width: 740px) {

            .card,
            .mobile-list,
            .item-card,
            .item-card-head,
            .item-meta,
            .texto-curto,
            .sizes-preview,
            .truncated-text,
            .price-preview {
                min-width: 0;
                max-width: 100%;
            }

            .item-card-head>* {
                min-width: 0;
            }

            .sizes-preview,
            .truncated-text,
            .price-preview,
            .texto-curto {
                overflow-wrap: anywhere;
            }
        }

        @media (min-width: 741px) {
            .container {
                width: min(1100px, 92vw);
                padding: 24px 0 48px;
            }

            .topbar-inner {
                width: min(1100px, 92vw);
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
            }

            .brand {
                text-align: left;
                justify-content: flex-start;
            }

            .actions {
                flex-direction: row;
                align-items: center;
            }

            .actions form,
            .btn {
                width: auto;
            }

            .card {
                padding: 18px;
            }

            .row-actions {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .row-actions form,
            .row-actions .btn {
                width: auto;
            }

            .page-head {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .desktop-only {
                display: block;
            }

            .mobile-only {
                display: none;
            }

            .actions-inline {
                flex-direction: row;
                gap: 10px;
            }

            .pagination-mobile .btn {
                width: 100%;
            }

            .table-wrap {
                overflow-x: auto;
            }
        }
    </style>
    @stack('head')
</head>

<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('admin.items.index') }}" class="brand">
                <img class="brand-logo" src="{{ asset('img/Logo_LaTorre.svg') }}" alt="La Torre">
                <span>La Torre Admin</span>
            </a>
            <div class="actions">
                <a class="btn" href="{{ route('menu.index') }}" target="_blank">Ver Cardápio</a>
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

    @stack('scripts')
</body>

</html>