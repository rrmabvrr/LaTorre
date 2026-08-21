<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | La Torre</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%8D%95%3C/text%3E%3C/svg%3E">
    @production
        @if(file_exists(public_path('build/manifest.json')))
            @vite(['resources/css/admin.css'])
        @else
            <link rel="stylesheet" href="{{ asset('admin.css') }}">
        @endif
    @else
        @vite(['resources/css/admin.css'])
    @endproduction
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
                @auth
                <a class="btn" href="{{ route('admin.items.index') }}">Itens</a>
                <a class="btn" href="{{ route('admin.pizza-prices.index') }}">Preços das Pizzas</a>
                @endauth
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