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
    <meta name="theme-color" content="#1f7a4a">
    <meta name="color-scheme" content="light">

    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/quenda" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --page-text-color: #241919;
            --page-background:
                radial-gradient(circle at top left, rgba(31, 122, 74, 0.16), transparent 24%),
                radial-gradient(circle at top right, rgba(198, 40, 40, 0.14), transparent 22%),
                linear-gradient(135deg, #fffaf3 0%, #f4eadc 48%, #efe4d4 100%);
            --page-overlay: linear-gradient(90deg,
                    rgba(31, 122, 74, 0.05) 0,
                    rgba(31, 122, 74, 0.05) 16%,
                    transparent 16%,
                    transparent 84%,
                    rgba(198, 40, 40, 0.05) 84%,
                    rgba(198, 40, 40, 0.05) 100%);
        }
    </style>

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
                                'brand-bg': '#1f1918',
                                'brand-red': '#c62828',
                                'brand-green': '#1f7a4a',
                                'brand-yellow': '#f4c95d',
                                'brand-wood': '#7a4b2b',
                                'brand-beige': '#f6e7c8',
                                'brand-paper': '#fffaf2',
                                'brand-ink': '#241919',
                            },
                            fontFamily: {
                                sans: ['Segoe UI', 'Inter', 'sans-serif'],
                                display: ['Quenda', 'Georgia', 'serif'],
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
            font-family: 'Segoe UI', 'Inter', sans-serif;
            color: var(--page-text-color);
            min-height: 100vh;
            background: var(--page-background);
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            background: var(--page-overlay);
            opacity: 0.9;
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
            border-radius: 1.75rem;
            border: 1px solid rgba(255, 255, 255, 0.7);
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 20px 60px rgba(24, 19, 17, 0.12);
            backdrop-filter: blur(24px);
        }

        .section-title {
            font-family: 'Quenda', 'Georgia', serif;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 400;
            letter-spacing: -0.03em;
            color: #1f1918;
        }

        .wood-strip-title {
            display: inline-flex;
            width: 100%;
            align-items: center;
            border-radius: 1.25rem;
            border: 1px solid rgba(122, 75, 43, 0.15);
            padding: 0.75rem 1rem;
            font-family: 'Quenda', 'Georgia', serif;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 400;
            letter-spacing: -0.03em;
            color: #241919;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(248, 240, 228, 0.92));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.85);
        }

        .wood-strip-subtitle {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(122, 75, 43, 0.15);
            padding: 0.375rem 0.75rem;
            font-family: 'Quenda', 'Georgia', serif;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            color: #241919;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(244, 239, 230, 0.92));
        }

        .menu-title,
        .menu-subtitle {
            font-family: 'Quenda', 'Georgia', serif;
        }

        .menu-description,
        .menu-value {
            font-family: 'Segoe UI', 'Inter', sans-serif;
        }

        .menu-title {
            letter-spacing: -0.03em;
        }

        .menu-subtitle {
            letter-spacing: 0.08em;
        }

        .menu-value {
            letter-spacing: -0.01em;
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
            gap: 0.5rem;
            border-radius: 9999px;
            border: 1px solid rgba(122, 75, 43, 0.15);
            background: rgba(255, 255, 255, 0.85);
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #241919;
            transition: transform 0.2s ease, border-color 0.2s ease, background-color 0.2s ease;
        }

        .pill-chip:hover {
            transform: translateY(-2px);
            border-color: rgba(31, 122, 74, 0.25);
            background: rgba(255, 255, 255, 1);
        }

        .menu-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(31, 122, 74, 0.15);
            background: rgba(31, 122, 74, 0.1);
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #1f7a4a;
        }

        .menu-stat,
        .menu-section-card {
            border: 1px solid rgba(255, 255, 255, 0.7);
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(24px);
            box-shadow: 0 20px 50px rgba(24, 19, 17, 0.08);
        }

        .menu-stat {
            border-radius: 1.5rem;
            padding: 1rem;
        }

        .menu-section-card {
            overflow: hidden;
            border-radius: 1.75rem;
        }

        .menu-panel {
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 251, 245, 0.88)),
                linear-gradient(135deg, rgba(31, 122, 74, 0.08), rgba(198, 40, 40, 0.08));
        }

        .menu-chip,
        .menu-chip-active,
        .btn-primary,
        .btn-secondary,
        .menu-floating-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border-radius: 9999px;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease, color 0.2s ease;
        }

        .menu-chip {
            border: 1px solid rgba(122, 75, 43, 0.15);
            background: rgba(255, 255, 255, 0.85);
            color: #241919;
        }

        .menu-chip-active {
            border: 1px solid rgba(31, 122, 74, 0.3);
            background: #1f7a4a;
            color: #fff;
        }

        .btn-primary {
            background: linear-gradient(90deg, #1f7a4a, #0f9d58, #c62828);
            color: #fff;
            box-shadow: 0 10px 22px rgba(31, 122, 74, 0.2);
        }

        .btn-secondary {
            border: 1px solid rgba(31, 122, 74, 0.2);
            background: #fff;
            color: #1f7a4a;
            box-shadow: 0 10px 22px rgba(31, 122, 74, 0.1);
        }

        .menu-floating-button {
            border: 1px solid rgba(31, 122, 74, 0.2);
            background: #1f7a4a;
            color: #fff;
            box-shadow: 0 10px 22px rgba(31, 122, 74, 0.1);
        }

        .menu-footer {
            background: linear-gradient(135deg, rgba(31, 122, 74, 0.98), rgba(27, 58, 40, 0.98));
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