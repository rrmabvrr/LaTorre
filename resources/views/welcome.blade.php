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
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <h2>Sua Comanda</h2>
            </div>
            <button class="comanda-close" id="comanda-close" aria-label="Fechar comanda" type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            <ul class="comanda-items" id="comanda-items"></ul>
        </div>

        <div class="comanda-footer" id="comanda-footer">
            <div class="comanda-total">
                <span>Total</span>
                <strong id="comanda-total-value">R$ 0,00</strong>
            </div>
            <textarea class="comanda-obs" id="comanda-obs" placeholder="Observações (ex: sem cebola, borda recheada...)" rows="2"></textarea>
            <button class="comanda-send" id="comanda-send" type="button">
                <svg viewBox="0 0 32 32" fill="currentColor" width="20" height="20">
                    <path d="M16.004 0C7.165 0 .003 7.161.003 16c0 2.822.736 5.575 2.137 8.004L.003 32l8.203-2.1A15.95 15.95 0 0016.004 32C24.843 32 32 24.839 32 16S24.843 0 16.004 0zm0 29.09a13.04 13.04 0 01-6.65-1.817l-.477-.284-4.94 1.296 1.32-4.822-.311-.495A13.03 13.03 0 012.913 16c0-7.218 5.873-13.09 13.09-13.09 3.496 0 6.782 1.362 9.253 3.833a13.01 13.01 0 013.834 9.257c0 7.218-5.873 13.09-13.086 13.09zm7.175-9.802c-.393-.197-2.326-1.148-2.687-1.279-.361-.131-.624-.197-.886.197-.263.393-1.018 1.279-1.248 1.541-.23.263-.46.296-.853.098-.393-.197-1.66-.612-3.162-1.95-1.169-1.041-1.958-2.327-2.188-2.72-.23-.394-.025-.607.173-.803.177-.177.393-.46.59-.69.197-.23.263-.394.394-.657.131-.263.066-.493-.033-.69-.098-.197-.886-2.137-1.214-2.924-.32-.768-.645-.663-.886-.676l-.755-.013c-.263 0-.69.098-1.051.493-.361.394-1.379 1.348-1.379 3.286 0 1.938 1.412 3.81 1.609 4.072.197.263 2.78 4.244 6.733 5.953.94.406 1.675.649 2.248.83.944.3 1.804.258 2.483.157.758-.113 2.326-.951 2.654-1.87.329-.918.329-1.705.23-1.87-.098-.164-.361-.263-.755-.46z" />
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
                <h1 class="logo-text">La Torre</h1>
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
                <a href="#tradicionais" class="nav-pill active" data-category="tradicionais">TRADICIONAIS</a>
                <a href="#especiais" class="nav-pill" data-category="especiais">ESPECIAIS</a>
                <a href="#premium" class="nav-pill" data-category="premium">PREMIUM</a>
                <a href="#doces" class="nav-pill" data-category="doces">DOCES</a>
                <a href="#bebidas" class="nav-pill" data-category="bebidas">BEBIDAS</a>
                <a href="#sorvetes" class="nav-pill" data-category="sorvetes">SORVETES</a>
            </nav>
        </div>
        <div class="hero-scroll-indicator">
            <span>Ver Cardápio</span>
            <div class="scroll-arrow">▼</div>
        </div>
    </header>

    <!-- Main Menu -->
    <main class="menu-container" id="menu-container">

        <!-- Tradicionais -->
        <section class="menu-section" id="tradicionais">
            <div class="section-header">
                <div class="section-icon">🍕</div>
                <h2 class="section-title">Pizzas Tradicionais</h2>
                <p class="section-desc">Clássicos que conquistam paladares</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid">
                <article class="menu-card" id="card-mussarela">
                    <div class="card-badge">Popular</div>
                    <div class="card-header">
                        <h3 class="card-title">Mussarela</h3>
                        <span class="card-price">R$ 35,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate especial, mussarela derretida, orégano e azeitonas</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Mussarela" data-price="35.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-calabresa">
                    <div class="card-badge bestseller">Mais Vendida</div>
                    <div class="card-header">
                        <h3 class="card-title">Calabresa</h3>
                        <span class="card-price">R$ 38,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, calabresa fatiada, cebola, mussarela e orégano</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Calabresa" data-price="38.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-portuguesa">
                    <div class="card-header">
                        <h3 class="card-title">Portuguesa</h3>
                        <span class="card-price">R$ 40,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, presunto, ovos, cebola, azeitona, ervilha e mussarela</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Portuguesa" data-price="40.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-margherita">
                    <div class="card-header">
                        <h3 class="card-title">Margherita</h3>
                        <span class="card-price">R$ 38,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, mussarela de búfala, tomate fresco, manjericão e azeite</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Margherita" data-price="38.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-frango-catupiry">
                    <div class="card-badge">Popular</div>
                    <div class="card-header">
                        <h3 class="card-title">Frango c/ Catupiry</h3>
                        <span class="card-price">R$ 40,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, frango desfiado, catupiry cremoso, milho e mussarela</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Frango c/ Catupiry" data-price="40.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-quatro-queijos-trad">
                    <div class="card-header">
                        <h3 class="card-title">Quatro Queijos</h3>
                        <span class="card-price">R$ 42,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, mussarela, provolone, parmesão e catupiry</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Quatro Queijos" data-price="42.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-napolitana">
                    <div class="card-header">
                        <h3 class="card-title">Napolitana</h3>
                        <span class="card-price">R$ 38,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, mussarela, tomate fatiado, parmesão e manjericão</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Napolitana" data-price="38.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card" id="card-bacon">
                    <div class="card-header">
                        <h3 class="card-title">Bacon</h3>
                        <span class="card-price">R$ 40,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, bacon crocante, mussarela, cebola e orégano</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Bacon" data-price="40.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

        <!-- Especiais -->
        <section class="menu-section" id="especiais">
            <div class="section-header">
                <div class="section-icon">⭐</div>
                <h2 class="section-title">Pizzas Especiais</h2>
                <p class="section-desc">Criações exclusivas do nosso pizzaiolo</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid">
                <article class="menu-card especial" id="card-carne-sol">
                    <div class="card-badge especial-badge">Especial</div>
                    <div class="card-header">
                        <h3 class="card-title">Carne de Sol</h3>
                        <span class="card-price">R$ 48,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, carne de sol desfiada, cebola caramelizada, catupiry e
                        mussarela</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Carne de Sol" data-price="48.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card especial" id="card-camarao">
                    <div class="card-badge especial-badge">Especial</div>
                    <div class="card-header">
                        <h3 class="card-title">Camarão</h3>
                        <span class="card-price">R$ 55,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, camarões selecionados, catupiry, mussarela e cebolinha</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Camarão" data-price="55.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card especial" id="card-peperoni">
                    <div class="card-header">
                        <h3 class="card-title">Pepperoni</h3>
                        <span class="card-price">R$ 45,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, pepperoni artesanal, mussarela especial e orégano</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Pepperoni" data-price="45.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card especial" id="card-la-torre">
                    <div class="card-badge bestseller">Da Casa</div>
                    <div class="card-header">
                        <h3 class="card-title">La Torre Especial</h3>
                        <span class="card-price">R$ 52,00</span>
                    </div>
                    <p class="card-desc">Molho especial, carne seca, bacon, catupiry, cebola roxa, rúcula e mussarela
                    </p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza La Torre Especial" data-price="52.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card especial" id="card-strogonoff">
                    <div class="card-header">
                        <h3 class="card-title">Strogonoff</h3>
                        <span class="card-price">R$ 45,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, strogonoff de frango, batata palha, mussarela e catupiry</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Strogonoff" data-price="45.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card especial" id="card-lombo-canadense">
                    <div class="card-header">
                        <h3 class="card-title">Lombo Canadense</h3>
                        <span class="card-price">R$ 48,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, lombo canadense, catupiry, mussarela e cebola caramelizada</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Lombo Canadense" data-price="48.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

        <!-- Premium -->
        <section class="menu-section" id="premium">
            <div class="section-header">
                <div class="section-icon">👑</div>
                <h2 class="section-title">Pizzas Premium</h2>
                <p class="section-desc">Para momentos especiais</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid">
                <article class="menu-card premium" id="card-filé-mignon">
                    <div class="card-badge premium-badge">Premium</div>
                    <div class="card-header">
                        <h3 class="card-title">Filé Mignon</h3>
                        <span class="card-price">R$ 58,00</span>
                    </div>
                    <p class="card-desc">Molho especial, filé mignon em tiras, champignon, catupiry e mussarela</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Filé Mignon" data-price="58.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card premium" id="card-salmao">
                    <div class="card-badge premium-badge">Premium</div>
                    <div class="card-header">
                        <h3 class="card-title">Salmão</h3>
                        <span class="card-price">R$ 62,00</span>
                    </div>
                    <p class="card-desc">Cream cheese, salmão defumado, alcaparras, cebola roxa e cebolinha</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Salmão" data-price="62.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card premium" id="card-costela">
                    <div class="card-badge premium-badge">Premium</div>
                    <div class="card-header">
                        <h3 class="card-title">Costela Desfiada</h3>
                        <span class="card-price">R$ 55,00</span>
                    </div>
                    <p class="card-desc">Molho barbecue, costela desfiada, cebola caramelizada, catupiry e mussarela</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Costela Desfiada" data-price="55.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card premium" id="card-parma">
                    <div class="card-header">
                        <h3 class="card-title">Parma com Rúcula</h3>
                        <span class="card-price">R$ 56,00</span>
                    </div>
                    <p class="card-desc">Molho de tomate, presunto parma, rúcula fresca, tomate seco e parmesão</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Parma com Rúcula" data-price="56.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

        <!-- Doces -->
        <section class="menu-section" id="doces">
            <div class="section-header">
                <div class="section-icon">🍫</div>
                <h2 class="section-title">Pizzas Doces</h2>
                <p class="section-desc">Sobremesas irresistíveis</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid">
                <article class="menu-card doce" id="card-chocolate">
                    <div class="card-badge doce-badge">Doce</div>
                    <div class="card-header">
                        <h3 class="card-title">Chocolate</h3>
                        <span class="card-price">R$ 38,00</span>
                    </div>
                    <p class="card-desc">Chocolate ao leite derretido, granulado e leite condensado</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Chocolate" data-price="38.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card doce" id="card-prestigio">
                    <div class="card-header">
                        <h3 class="card-title">Prestígio</h3>
                        <span class="card-price">R$ 40,00</span>
                    </div>
                    <p class="card-desc">Chocolate ao leite, coco ralado e leite condensado</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Prestígio" data-price="40.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card doce" id="card-romeu-julieta">
                    <div class="card-badge bestseller">Favorita</div>
                    <div class="card-header">
                        <h3 class="card-title">Romeu e Julieta</h3>
                        <span class="card-price">R$ 40,00</span>
                    </div>
                    <p class="card-desc">Goiabada cremosa, queijo mussarela e leite condensado</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Romeu e Julieta" data-price="40.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card doce" id="card-banana-canela">
                    <div class="card-header">
                        <h3 class="card-title">Banana c/ Canela</h3>
                        <span class="card-price">R$ 38,00</span>
                    </div>
                    <p class="card-desc">Banana caramelizada, canela, açúcar e leite condensado</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Banana c/ Canela" data-price="38.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card doce" id="card-ninho-nutella">
                    <div class="card-header">
                        <h3 class="card-title">Ninho c/ Nutella</h3>
                        <span class="card-price">R$ 45,00</span>
                    </div>
                    <p class="card-desc">Creme de leite ninho, Nutella, leite condensado e morangos</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Ninho c/ Nutella" data-price="45.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card doce" id="card-sensacao">
                    <div class="card-header">
                        <h3 class="card-title">Sensação</h3>
                        <span class="card-price">R$ 42,00</span>
                    </div>
                    <p class="card-desc">Chocolate ao leite, morangos fatiados e leite condensado</p>
                    <div class="card-footer">
                        <span class="card-size">🍕 Grande</span>
                        <button type="button" class="card-order btn-add-comanda" data-name="Pizza Sensação" data-price="42.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

        <!-- Bebidas -->
        <section class="menu-section" id="bebidas">
            <div class="section-header">
                <div class="section-icon">🥤</div>
                <h2 class="section-title">Bebidas</h2>
                <p class="section-desc">Para acompanhar sua pizza</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid bebidas-grid">
                <article class="menu-card bebida" id="card-coca-lata">
                    <div class="card-header">
                        <h3 class="card-title">Coca-Cola Lata</h3>
                        <span class="card-price">R$ 6,00</span>
                    </div>
                    <p class="card-desc">350ml</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Coca-Cola Lata" data-price="6.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card bebida" id="card-coca-2l">
                    <div class="card-header">
                        <h3 class="card-title">Coca-Cola 2L</h3>
                        <span class="card-price">R$ 14,00</span>
                    </div>
                    <p class="card-desc">2 litros</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Coca-Cola 2L" data-price="14.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card bebida" id="card-guarana-lata">
                    <div class="card-header">
                        <h3 class="card-title">Guaraná Lata</h3>
                        <span class="card-price">R$ 5,00</span>
                    </div>
                    <p class="card-desc">350ml</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Guaraná Lata" data-price="5.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card bebida" id="card-guarana-2l">
                    <div class="card-header">
                        <h3 class="card-title">Guaraná 2L</h3>
                        <span class="card-price">R$ 12,00</span>
                    </div>
                    <p class="card-desc">2 litros</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Guaraná 2L" data-price="12.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card bebida" id="card-suco-natural">
                    <div class="card-header">
                        <h3 class="card-title">Suco Natural</h3>
                        <span class="card-price">R$ 10,00</span>
                    </div>
                    <p class="card-desc">500ml - Diversos sabores</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Suco Natural" data-price="10.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card bebida" id="card-agua">
                    <div class="card-header">
                        <h3 class="card-title">Água Mineral</h3>
                        <span class="card-price">R$ 4,00</span>
                    </div>
                    <p class="card-desc">500ml - Com ou sem gás</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Água Mineral" data-price="4.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

        <!-- Sorvetes -->
        <section class="menu-section" id="sorvetes">
            <div class="section-header">
                <div class="section-icon">🍨</div>
                <h2 class="section-title">Sorvetes</h2>
                <p class="section-desc">Refrescância em cada colherada</p>
                <div class="section-divider"></div>
            </div>
            <div class="menu-grid">
                <article class="menu-card sorvete" id="card-sorvete-1bola">
                    <div class="card-header">
                        <h3 class="card-title">1 Bola</h3>
                        <span class="card-price">R$ 8,00</span>
                    </div>
                    <p class="card-desc">Escolha seu sabor favorito: chocolate, morango, baunilha, creme, flocos e muito
                        mais</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Sorvete 1 Bola" data-price="8.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card sorvete" id="card-sorvete-2bolas">
                    <div class="card-badge">Popular</div>
                    <div class="card-header">
                        <h3 class="card-title">2 Bolas</h3>
                        <span class="card-price">R$ 14,00</span>
                    </div>
                    <p class="card-desc">Combine dois sabores da nossa seleção especial com cobertura à sua escolha</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Sorvete 2 Bolas" data-price="14.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card sorvete" id="card-sorvete-3bolas">
                    <div class="card-header">
                        <h3 class="card-title">3 Bolas</h3>
                        <span class="card-price">R$ 18,00</span>
                    </div>
                    <p class="card-desc">Três sabores com cobertura, chantilly, granulado e canudo</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Sorvete 3 Bolas" data-price="18.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card sorvete" id="card-sundae">
                    <div class="card-badge bestseller">Imperdível</div>
                    <div class="card-header">
                        <h3 class="card-title">Sundae Especial</h3>
                        <span class="card-price">R$ 22,00</span>
                    </div>
                    <p class="card-desc">3 bolas, calda quente de chocolate, chantilly, castanhas, granulado e cereja
                    </p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Sundae Especial" data-price="22.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card sorvete" id="card-milkshake">
                    <div class="card-header">
                        <h3 class="card-title">Milkshake</h3>
                        <span class="card-price">R$ 18,00</span>
                    </div>
                    <p class="card-desc">500ml - Chocolate, morango, baunilha ou Ovomaltine com chantilly</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Milkshake" data-price="18.00">Adicionar</button>
                    </div>
                </article>
                <article class="menu-card sorvete" id="card-acai">
                    <div class="card-header">
                        <h3 class="card-title">Açaí 500ml</h3>
                        <span class="card-price">R$ 20,00</span>
                    </div>
                    <p class="card-desc">Açaí cremoso com granola, banana, leite condensado e leite em pó</p>
                    <div class="card-footer">
                        <button type="button" class="card-order btn-add-comanda" data-name="Açaí 500ml" data-price="20.00">Adicionar</button>
                    </div>
                </article>
            </div>
        </section>

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

    <script src="{{ asset('script.js') }}"></script>
    <script src="{{ asset('comanda.js') }}"></script>
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