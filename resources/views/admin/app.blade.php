<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | La Torre</title>
    @vite(['resources/css/admin.css'])
    @stack('head')
</head>

<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('admin.items.index') }}" class="brand">
                <img class="brand-logo" src="{{ asset('img/Logo_LaTorre.svg') }}" alt="La Torre">
                <span>Admin</span>
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