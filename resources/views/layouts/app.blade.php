<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Torre Pizzaria e Sorveteria | Cardápio')</title>
    <meta name="description" content="@yield('meta_description', 'Cardápio da La Torre Pizzaria e Sorveteria. Pizzas artesanais, sorvetes e muito mais. De Terça a Domingo a partir das 18h. Peça pelo WhatsApp!')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ filemtime(public_path('style.css')) }}">
    @stack('head')
</head>

<body>
    @yield('content')
    @stack('scripts')
</body>

</html>