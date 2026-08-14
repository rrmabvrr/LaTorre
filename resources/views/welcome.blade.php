<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Torre Pizzaria e Sorveteria | Cardápio</title>
    <meta name="description"
        content="Cardápio da La Torre Pizzaria e Sorveteria. Pizzas artesanais, sorvetes e muito mais. De Terça a Domingo a partir das 18h. Peça pelo WhatsApp!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ filemtime(public_path('style.css')) }}">
</head>

<body>
    <!-- WhatsApp button -->
    <a href="https://wa.me/5595991428625" target="_blank" class="whatsapp-float" id="whatsapp-float"
        aria-label="Fale conosco pelo WhatsApp">
        <svg viewBox="0 0 32 32" fill="currentColor">
            <path
                d="M16.004 0C7.165 0 .003 7.161.003 16c0 2.822.736 5.575 2.137 8.004L.003 32l8.203-2.1A15.95 15.95 0 0016.004 32C24.843 32 32 24.839 32 16S24.843 0 16.004 0zm0 29.09a13.04 13.04 0 01-6.65-1.817l-.477-.284-4.94 1.296 1.32-4.822-.311-.495A13.03 13.03 0 012.913 16c0-7.218 5.873-13.09 13.09-13.09 3.496 0 6.782 1.362 9.253 3.833a13.01 13.01 0 013.834 9.257c0 7.218-5.873 13.09-13.086 13.09zm7.175-9.802c-.393-.197-2.326-1.148-2.687-1.279-.361-.131-.624-.197-.886.197-.263.393-1.018 1.279-1.248 1.541-.23.263-.46.296-.853.098-.393-.197-1.66-.612-3.162-1.95-1.169-1.041-1.958-2.327-2.188-2.72-.23-.394-.025-.607.173-.803.177-.177.393-.46.59-.69.197-.23.263-.394.394-.657.131-.263.066-.493-.033-.69-.098-.197-.886-2.137-1.214-2.924-.32-.768-.645-.663-.886-.676l-.755-.013c-.263 0-.69.098-1.051.493-.361.394-1.379 1.348-1.379 3.286 0 1.938 1.412 3.81 1.609 4.072.197.263 2.78 4.244 6.733 5.953.94.406 1.675.649 2.248.83.944.3 1.804.258 2.483.157.758-.113 2.326-.951 2.654-1.87.329-.918.329-1.705.23-1.87-.098-.164-.361-.263-.755-.46z" />
        </svg>
        <span class="whatsapp-tooltip">Peça pelo WhatsApp!</span>
    </a>

    <!-- Comanda Toggle Button -->
    <button class="comanda-toggle" id="comanda-toggle" aria-label="Abrir comanda" type="button">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 01-8 0"></path>
        </svg>
        <span class="comanda-badge" id="comanda-badge">0</span>
    </button>

    <!-- Comanda Panel -->
    <div class="comanda-overlay" id="comanda-overlay"></div>
    <aside class="comanda-panel" id="comanda-panel">
        <div class="comanda-header">
            <div class="comanda-header-info">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" width="24" height="24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <h2>Sua Comanda</h2>
            </div>
            <button class="comanda-close" id="comanda-close" aria-label="Fechar comanda" type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <div class="comanda-body" id="comanda-body">
            <div class="comanda-empty" id="comanda-empty">
                <div class="comanda-empty-icon">🛒</div>
                <p>Sua comanda está vazia</p>
                <span>Adicione itens do cardápio</span>
            </div>
            <div class="comanda-extra" id="comanda-extra" style="display: none;">
                <label class="comanda-extra-toggle" for="comanda-extra-batata">
                    <input type="checkbox" id="comanda-extra-batata">
                    <span id="comanda-extra-label">Adicional de batatas</span>
                    <strong id="comanda-extra-price">R$ 7,00</strong>
                </label>
            </div>
            <ul class="comanda-items" id="comanda-items"></ul>
        </div>

        <div class="comanda-footer" id="comanda-footer">
            <div class="comanda-total">
                <span>Total</span>
                <strong id="comanda-total-value">R$ 0,00</strong>
            </div>
            <textarea class="comanda-obs" id="comanda-obs" placeholder="Observações (ex: sem cebola, borda recheada...)"
                rows="2"></textarea>
            <button class="comanda-send" id="comanda-send" type="button">
                <svg viewBox="0 0 32 32" fill="currentColor" width="20" height="20">
                    <path
                        d="M16.004 0C7.165 0 .003 7.161.003 16c0 2.822.736 5.575 2.137 8.004L.003 32l8.203-2.1A15.95 15.95 0 0016.004 32C24.843 32 32 24.839 32 16S24.843 0 16.004 0zm0 29.09a13.04 13.04 0 01-6.65-1.817l-.477-.284-4.94 1.296 1.32-4.822-.311-.495A13.03 13.03 0 012.913 16c0-7.218 5.873-13.09 13.09-13.09 3.496 0 6.782 1.362 9.253 3.833a13.01 13.01 0 013.834 9.257c0 7.218-5.873 13.09-13.086 13.09zm7.175-9.802c-.393-.197-2.326-1.148-2.687-1.279-.361-.131-.624-.197-.886.197-.263.393-1.018 1.279-1.248 1.541-.23.263-.46.296-.853.098-.393-.197-1.66-.612-3.162-1.95-1.169-1.041-1.958-2.327-2.188-2.72-.23-.394-.025-.607.173-.803.177-.177.393-.46.59-.69.197-.23.263-.394.394-.657.131-.263.066-.493-.033-.69-.098-.197-.886-2.137-1.214-2.924-.32-.768-.645-.663-.886-.676l-.755-.013c-.263 0-.69.098-1.051.493-.361.394-1.379 1.348-1.379 3.286 0 1.938 1.412 3.81 1.609 4.072.197.263 2.78 4.244 6.733 5.953.94.406 1.675.649 2.248.83.944.3 1.804.258 2.483.157.758-.113 2.326-.951 2.654-1.87.329-.918.329-1.705.23-1.87-.098-.164-.361-.263-.755-.46z" />
                </svg>
                Enviar Pedido pelo WhatsApp
            </button>
            <button class="comanda-clear" id="comanda-clear" type="button">Limpar Comanda</button>
        </div>
    </aside>

    <!-- Hero / Header -->
    <header class="hero" id="hero">
        <div class="hero-bg-pattern"></div>
        <div class="hero-content">
            <div class="logo-container" id="logo-container">
                <div class="pizza-icon">🍕</div>
                <img src="{{ asset('img/Logo_LaTorre.svg') }}" alt="La Torre" class="logo-image">
                <p class="logo-subtitle">Pizzaria e Sorveteria</p>
            </div>
            <div class="hero-info">
                <p class="hero-hours">
                    <span class="icon-clock">🕕</span>
                    De Terça a Domingo a partir das 18h00
                </p>
                <p class="hero-address">
                    <span class="icon-pin">📍</span>
                    Av. São Joaquim, 1127 - Dr. Silvio Leite
                </p>
                <div class="hero-phones">
                    <a href="https://wa.me/5595991428625" class="phone-link">
                        <span class="whatsapp-icon-small">📱</span> 99142-8625
                    </a>
                    <a href="tel:991429922" class="phone-link">
                        <span class="whatsapp-icon-small">📞</span> 99142-9922
                    </a>
                </div>
            </div>
            <nav class="menu-nav text-uppercase" id="menu-nav">
                @foreach ($categories as $categoryKey => $category)
                <a href="#{{ $categoryKey }}" class="nav-pill {{ $loop->first ? 'active' : '' }}"
                    data-category="{{ $categoryKey }}">{{ $category['nav'] }}</a>
                @endforeach
            </nav>
        </div>
        <div class="hero-scroll-indicator">
            <span>Ver Cardápio</span>
            <div class="scroll-arrow">▼</div>
        </div>
    </header>

    <!-- Main Menu -->
    <main class="menu-container" id="menu-container">
        @foreach ($categories as $categoryKey => $category)
        @php
        $items = $groupedItems->get($categoryKey, collect());
        $sectionClasses = trim('menu-grid ' . ($categoryKey === 'bebidas' ? 'bebidas-grid' : ''));
        @endphp
        <section class="menu-section" id="{{ $categoryKey }}">
            <div class="section-header">
                <div class="section-icon">{{ $category['icon'] }}</div>
                <h2 class="section-title">{{ $category['title'] }}</h2>
                <p class="section-desc">{{ $category['description'] }}</p>
                <div class="section-divider"></div>
            </div>
            <div class="{{ $sectionClasses }}">
                @forelse ($items as $item)
                @php
                $itemName = is_object($item) ? $item->name : ($item['name'] ?? 'Item');
                $itemPrice = is_object($item) ? (float) $item->price : (float) ($item['price'] ?? 0);
                $itemDescription = is_object($item) ? $item->description : ($item['description'] ?? null);
                $itemId = is_object($item) ? $item->id : ($item['id'] ?? $loop->index);
                $itemSizes = is_object($item)
                ? ($item->sizes ?? null)
                : ((is_array($item) && isset($item['sizes'])) ? $item['sizes'] : null);
                $rawPizzaSizes = in_array($categoryKey, ['tradicionais', 'especiais', 'nobres'], true)
                ? ((is_array($itemSizes) && ! empty($itemSizes)) ? $itemSizes : [
                'MÉDIA' => 39.90,
                'GRANDE' => 49.90,
                'FAMÍLIA' => 69.90,
                'BIG' => 89.90,
                ])
                : null;
                $pizzaSizes = [];
                foreach (['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'] as $sizeName) {
                if (isset($rawPizzaSizes[$sizeName])) {
                $pizzaSizes[$sizeName] = (float) $rawPizzaSizes[$sizeName];
                }
                }
                $juiceOptions = in_array($categoryKey, ['sucos_naturais'], true)
                ? ((is_array($itemSizes) && ! empty($itemSizes)) ? $itemSizes : [
                'COPO' => 12.00,
                'JARRA' => 24.00,
                'ADICIONAL DE LEITE' => 5.00,
                ])
                : null;
                @endphp
                <article class="menu-card {{ $category['cardClass'] }}" id="card-item-{{ $itemId }}">
                    <div class="card-header">
                        <h3 class="card-title">{{ $itemName }}</h3>
                    </div>
                    @if ($itemDescription)
                    <p class="card-desc">{{ $itemDescription }}</p>
                    @endif
                    @if (!empty($pizzaSizes))
                    <div class="pizza-sizes" aria-label="Tamanhos e preços da pizza {{ $itemName }}">
                        @foreach ($pizzaSizes as $sizeName => $sizePrice)
                        <label class="pizza-size-option">
                            <input type="checkbox" class="pizza-size-checkbox" data-size="{{ $sizeName }}"
                                data-price="{{ number_format((float) $sizePrice, 2, '.', '') }}"
                                data-name="{{ $itemName }}">
                            <span class="pizza-size-name">{{ $sizeName }}</span>
                            <span class="pizza-size-price">R$ {{ number_format((float) $sizePrice, 2, ',', '.')
                                }}</span>
                        </label>
                        @endforeach
                    </div>
                    <div class="pizza-size-message" aria-live="polite"></div>
                    @elseif (!empty($juiceOptions))
                    <div class="pizza-sizes" aria-label="Opções e preços do suco {{ $itemName }}">
                        @foreach ($juiceOptions as $optionName => $optionPrice)
                        <label class="pizza-size-option">
                            <input type="checkbox" class="pizza-size-checkbox" data-size="{{ $optionName }}"
                                data-price="{{ number_format((float) $optionPrice, 2, '.', '') }}"
                                data-name="{{ $itemName }}">
                            <span class="pizza-size-name">{{ $optionName }}</span>
                            <span class="pizza-size-price">R$ {{ number_format((float) $optionPrice, 2, ',', '.')
                                }}</span>
                        </label>
                        @endforeach
                    </div>
                    <div class="pizza-size-message" aria-live="polite"></div>
                    @endif
                    <div class="card-footer">
                        @if (empty($pizzaSizes) && empty($juiceOptions))
                        <span class="card-size">{{ $categoryKey === 'bebidas' ? 'Refrescante' : '' }}</span>
                        @endif
                        <button type="button" class="card-order btn-add-comanda" data-name="{{ $itemName }}"
                            data-base-name="{{ $itemName }}"
                            data-price="{{ number_format($itemPrice, 2, '.', '') }}">Adicionar</button>
                    </div>
                </article>
                @empty
                <article class="menu-card {{ $category['cardClass'] }}" style="grid-column: 1 / -1;">
                    <p class="card-desc">Nenhum item disponível nesta categoria no momento.</p>
                </article>
                @endforelse
            </div>
        </section>
        @endforeach

        <!-- Info Section -->
        <section class="info-banner" id="info-banner">
            <div class="info-content">
                <div class="info-item">
                    <span class="info-icon">🛵</span>
                    <div>
                        <h3>Delivery</h3>
                        <p>Entrega rápida na sua casa</p>
                    </div>
                </div>
                <div class="info-item">
                    <span class="info-icon">💳</span>
                    <div>
                        <h3>Pagamento</h3>
                        <p>Dinheiro, Pix, Cartão</p>
                    </div>
                </div>
                <div class="info-item">
                    <span class="info-icon">⏰</span>
                    <div>
                        <h3>Horário</h3>
                        <p>Terça a Domingo - 18h às 23h</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <button class="back-to-top" id="back-to-top" aria-label="Voltar ao topo" type="button">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 19V5"></path>
            <path d="M5 12l7-7 7 7"></path>
        </svg>
    </button>

    <footer class="footer" id="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <h2 class="footer-logo">La Torre</h2>
                <p>Pizzaria e Sorveteria</p>
            </div>
            <div class="footer-contact">
                <p>📍 Av. São Joaquim, 1127 - Dr. Silvio Leite</p>
                <p>📱 99142-8625 | 📞 99142-9922</p>
                <p>🕕 Terça a Domingo a partir das 18h00</p>
            </div>
            <div class="footer-cta">
                <a href="https://wa.me/5595991428625?text=Olá! Gostaria de fazer um pedido" class="footer-whatsapp-btn"
                    target="_blank">
                    Fazer Pedido pelo WhatsApp
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 La Torre Pizzaria e Sorveteria. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        window.extraBatataConfig = @json([
            'name' => $extraBatataItem?->name ?? 'ADICIONAL DE BATATAS',
            'price' => (float) ($extraBatataItem?->price ?? 7.00),
        ]);
    </script>
    <script src="{{ asset('script.js') }}?v={{ filemtime(public_path('script.js')) }}"></script>
    <script src="{{ asset('comanda.js') }}?v={{ filemtime(public_path('comanda.js')) }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('back-to-top');

            if (!button) {
                return;
            }

            const toggleVisibility = () => {
                button.classList.toggle('visible', window.scrollY > 400);
            };

            button.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            window.addEventListener('scroll', toggleVisibility, {
                passive: true
            });
            toggleVisibility();
        });
    </script>
</body>

</html>