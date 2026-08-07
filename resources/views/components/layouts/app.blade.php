<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Pizzaria La Torre | Cardápio Público' }}</title>
    <meta name="description"
        content="{{ $description ?? 'Cardápio público da Pizzaria La Torre com pizzas, sorvetes, bebidas e delivery.' }}">
    <meta name="keywords" content="pizzaria, sorveteria, cardápio, pizza artesanal, delivery, la torre">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Pizzaria La Torre">
    <meta name="theme-color" content="#211F20">

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/quenda" rel="stylesheet">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="Pizzaria La Torre">
    <meta property="og:title" content="{{ $title ?? 'Pizzaria La Torre | Cardápio Público' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Pizzas, sorvetes, bebidas e muito mais para toda a família.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? 'https://picsum.photos/id/1080/1280/720.webp' }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Pizzaria La Torre | Cardápio Público' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Cardápio online da Pizzaria La Torre.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? 'https://picsum.photos/id/1080/1280/720.webp' }}">

    @php
    $schemaData = [
    '@context' => 'https://schema.org',
    '@type' => 'Restaurant',
    'name' => 'Pizzaria La Torre',
    'servesCuisine' => ['Pizza', 'Sorvete', 'Bebidas'],
    'priceRange' => '$$',
    'url' => url('/'),
    'image' => $ogImage ?? 'https://picsum.photos/id/1080/1280/720.webp',
    'telephone' => '+55 91 99999-9999',
    'sameAs' => [
    'https://wa.me/5591999999999',
    ],
    'address' => [
    '@type' => 'PostalAddress',
    'addressCountry' => 'BR',
    'addressRegion' => 'PA',
    ],
    ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($schemaData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
    </script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script>
        tailwind = {
                config: {
                    theme: {
                        extend: {
                            colors: {
                                'brand-bg': '#252224',
                                'brand-red': '#E6202A',
                                'brand-green': '#0F9D58',
                                'brand-yellow': '#F5D11F',
                                'brand-wood': '#4A2411',
                                'brand-beige': '#F6D98F',
                                'brand-paper': '#FDF2D4',
                                'brand-ink': '#2B2828',
                            },
                            fontFamily: {
                                sans: ['Quenda', 'Segoe UI', 'sans-serif'],
                                display: ['Quenda', 'Segoe UI', 'sans-serif'],
                            },
                        },
                    },
                },
            };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Quenda', 'Segoe UI', sans-serif;
            color: #2B2828;
            min-height: 100vh;
            background:
                radial-gradient(circle at top right, rgba(230, 32, 42, 0.12), transparent 28%),
                radial-gradient(circle at bottom left, rgba(15, 157, 88, 0.14), transparent 24%),
                linear-gradient(160deg, #1d1b1c 0%, #252224 45%, #2b221d 100%);
        }

        .container-shell {
            width: 100%;
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (min-width: 640px) {
            .container-shell {
                padding: 0 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .container-shell {
                padding: 0 2rem;
            }
        }

        .surface-card {
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(4px);
        }

        .section-title {
            font-family: 'Quenda', 'Segoe UI', sans-serif;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 400;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .wood-strip-title {
            display: inline-flex;
            width: 100%;
            align-items: center;
            border-radius: 1rem;
            border: 1px solid #2d160b;
            padding: 0.5rem 1rem;
            font-family: 'Quenda', 'Segoe UI', sans-serif;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 400;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            color: #F5D11F;
            text-shadow: 0 2px 0 rgba(0, 0, 0, 0.35);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(0, 0, 0, 0.12)),
                repeating-linear-gradient(90deg,
                    #5f3118 0px,
                    #5f3118 26px,
                    #4a2411 26px,
                    #4a2411 48px,
                    #3d1d0e 48px,
                    #3d1d0e 70px);
        }

        .wood-strip-subtitle {
            display: inline-flex;
            align-items: center;
            border-radius: 0.75rem;
            border: 1px solid #2d160b;
            padding: 0.375rem 0.75rem;
            font-family: 'Quenda', 'Segoe UI', sans-serif;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 400;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            color: #F5D11F;
            text-shadow: 0 2px 0 rgba(0, 0, 0, 0.35);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.08), rgba(0, 0, 0, 0.12)),
                repeating-linear-gradient(90deg,
                    #5f3118 0px,
                    #5f3118 24px,
                    #4a2411 24px,
                    #4a2411 44px,
                    #3d1d0e 44px,
                    #3d1d0e 64px);
        }

        .menu-title,
        .menu-subtitle,
        .menu-description,
        .menu-value {
            font-family: 'Quenda', 'Segoe UI', sans-serif;
        }

        .menu-value {
            letter-spacing: 0.01em;
        }

        @media (min-width: 768px) {
            .section-title {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .wood-strip-title {
                padding: 0.625rem 1.25rem;
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .wood-strip-subtitle {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }
        }

        .pill-chip {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(74, 36, 17, 0.25);
            background: rgba(245, 209, 31, 0.3);
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 800;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            color: #2B2828;
            transition: background-color 0.2s;
        }

        .pill-chip:hover {
            background: rgba(245, 209, 31, 0.45);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: #E6202A;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 800;
            letter-spacing: 0.025em;
            text-transform: uppercase;
            color: #fff;
            box-shadow: 0 8px 20px rgba(230, 32, 42, 0.35);
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: #bf1a22;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            border: 1px solid #0F9D58;
            background: #0F9D58;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 800;
            letter-spacing: 0.025em;
            text-transform: uppercase;
            color: #fff;
            box-shadow: 0 8px 20px rgba(15, 157, 88, 0.25);
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            background: #0b7c45;
        }

        .animate-rise {
            animation: riseIn 0.55s ease both;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('head')
</head>

<body class="font-sans antialiased">
    {{ $slot }}

    @stack('scripts')
</body>

</html>