<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'La Torre Pizzaria e Sorveteria | Cardápio')</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%8D%95%3C/text%3E%3C/svg%3E">
    <meta name="description" content="@yield('meta_description', 'Cardápio da La Torre Pizzaria e Sorveteria. Pizzas artesanais, sorvetes e muito mais. De Terça a Domingo a partir das 18h. Peça pelo WhatsApp!')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    @production
        @if(file_exists(public_path('build/manifest.json')))
            @vite(['resources/css/style.css'])
        @else
            <link rel="stylesheet" href="{{ asset('style.css') }}">
        @endif
    @else
        @vite(['resources/css/style.css'])
    @endproduction
    @stack('head')
</head>

<body>
    @yield('content')
    @stack('scripts')
</body>

</html>