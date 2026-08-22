<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Torre | Cardápio</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%8D%95%3C/text%3E%3C/svg%3E">
    <style>
        :root {
            --bg: #f8f4ec;
            --ink: #24201c;
            --card: #fff;
            --line: #e7ddcf;
            --accent: #bf3f20;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: var(--ink);
            background: linear-gradient(180deg, #fffaf1 0%, var(--bg) 100%);
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
        }

        .hero {
            padding: 36px 16px 22px;
            text-align: center;
            background: radial-gradient(circle at top center, #ffd8bf 0%, #fff4e8 45%, #fff9f1 100%);
            border-bottom: 1px solid var(--line);
        }

        h1 { margin: 0; font-size: clamp(32px, 5vw, 54px); }

        .subtitle { margin: 8px 0 0; color: #5e554a; }

        .admin-link {
            display: inline-block;
            margin-top: 16px;
            background: var(--accent);
            color: #fff;
            border-radius: 999px;
            text-decoration: none;
            padding: 10px 16px;
            font-weight: 700;
        }

        main {
            width: min(980px, 92vw);
            margin: 24px auto 44px;
            display: grid;
            gap: 18px;
        }

        .section {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 16px;
        }

        .section h2 {
            margin: 0 0 12px;
            font-size: 22px;
            color: #7a2c1a;
        }

        .item {
            display: grid;
            gap: 4px;
            padding: 10px 0;
            border-top: 1px dashed #e6dccf;
        }

        .item:first-of-type { border-top: 0; padding-top: 0; }

        .line {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 12px;
        }

        .name { font-weight: 700; }

        .price { color: #0f6f2f; font-weight: 700; }

        .desc { color: #685f54; }

        .empty {
            color: #786f63;
            font-style: italic;
            margin: 0;
        }
    </style>
</head>

<body>
    <header class="hero">
        <h1>La Torre</h1>
        <p class="subtitle">Cardápio digital atualizado</p>
        <a class="admin-link" href="{{ route('admin.login') }}">Entrar no Admin</a>
    </header>

    <main>
        @forelse ($categories as $key => $label)
            @php
                $items = $groupedItems->get($key, collect());
            @endphp
            <section class="section">
                <h2>{{ $label }}</h2>

                @if ($items->isEmpty())
                    <p class="empty">Sem itens disponíveis nesta categoria.</p>
                @else
                    @foreach ($items as $item)
                        <article class="item">
                            <div class="line">
                                <span class="name">{{ $item->name }}</span>
                                <span class="price">R$ {{ number_format((float) $item->price, 2, ',', '.') }}</span>
                            </div>
                            @if ($item->description)
                                <p class="desc">{{ $item->description }}</p>
                            @endif
                        </article>
                    @endforeach
                @endif
            </section>
        @empty
            <section class="section">
                <p class="empty">Nenhuma categoria cadastrada.</p>
            </section>
        @endforelse
    </main>
</body>

</html>
