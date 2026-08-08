<?php
header('Content-Type: text/html; charset=utf-8');

$sections = [
    [
        'id' => 'tradicionais',
        'icon' => '🍕',
        'title' => 'Pizzas Tradicionais',
        'description' => 'Clássicos que conquistam paladares',
        'items' => [
            ['id' => 'card-mussarela', 'badge' => 'Popular', 'badgeClass' => '', 'title' => 'Mussarela', 'price' => 'R$ 35,00', 'description' => 'Molho de tomate especial, mussarela derretida, orégano e azeitonas', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Mussarela', 'cardClass' => ''],
            ['id' => 'card-calabresa', 'badge' => 'Mais Vendida', 'badgeClass' => 'bestseller', 'title' => 'Calabresa', 'price' => 'R$ 38,00', 'description' => 'Molho de tomate, calabresa fatiada, cebola, mussarela e orégano', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Calabresa', 'cardClass' => ''],
            ['id' => 'card-portuguesa', 'badge' => '', 'badgeClass' => '', 'title' => 'Portuguesa', 'price' => 'R$ 40,00', 'description' => 'Molho de tomate, presunto, ovos, cebola, azeitona, ervilha e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Portuguesa', 'cardClass' => ''],
            ['id' => 'card-margherita', 'badge' => '', 'badgeClass' => '', 'title' => 'Margherita', 'price' => 'R$ 38,00', 'description' => 'Molho de tomate, mussarela de búfala, tomate fresco, manjericão e azeite', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Margherita', 'cardClass' => ''],
            ['id' => 'card-frango-catupiry', 'badge' => 'Popular', 'badgeClass' => '', 'title' => 'Frango c/ Catupiry', 'price' => 'R$ 40,00', 'description' => 'Molho de tomate, frango desfiado, catupiry cremoso, milho e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Frango com Catupiry', 'cardClass' => ''],
            ['id' => 'card-quatro-queijos-trad', 'badge' => '', 'badgeClass' => '', 'title' => 'Quatro Queijos', 'price' => 'R$ 42,00', 'description' => 'Molho de tomate, mussarela, provolone, parmesão e catupiry', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Quatro Queijos', 'cardClass' => ''],
            ['id' => 'card-napolitana', 'badge' => '', 'badgeClass' => '', 'title' => 'Napolitana', 'price' => 'R$ 38,00', 'description' => 'Molho de tomate, mussarela, tomate fatiado, parmesão e manjericão', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Napolitana', 'cardClass' => ''],
            ['id' => 'card-bacon', 'badge' => '', 'badgeClass' => '', 'title' => 'Bacon', 'price' => 'R$ 40,00', 'description' => 'Molho de tomate, bacon crocante, mussarela, cebola e orégano', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Bacon', 'cardClass' => ''],
        ],
    ],
    [
        'id' => 'especiais',
        'icon' => '⭐',
        'title' => 'Pizzas Especiais',
        'description' => 'Criações exclusivas do nosso pizzaiolo',
        'items' => [
            ['id' => 'card-carne-sol', 'badge' => 'Especial', 'badgeClass' => 'especial-badge', 'title' => 'Carne de Sol', 'price' => 'R$ 48,00', 'description' => 'Molho de tomate, carne de sol desfiada, cebola caramelizada, catupiry e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Carne de Sol', 'cardClass' => 'especial'],
            ['id' => 'card-camarao', 'badge' => 'Especial', 'badgeClass' => 'especial-badge', 'title' => 'Camarão', 'price' => 'R$ 55,00', 'description' => 'Molho de tomate, camarões selecionados, catupiry, mussarela e cebolinha', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Camarão', 'cardClass' => 'especial'],
            ['id' => 'card-peperoni', 'badge' => '', 'badgeClass' => '', 'title' => 'Pepperoni', 'price' => 'R$ 45,00', 'description' => 'Molho de tomate, pepperoni artesanal, mussarela especial e orégano', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Pepperoni', 'cardClass' => 'especial'],
            ['id' => 'card-la-torre', 'badge' => 'Da Casa', 'badgeClass' => 'bestseller', 'title' => 'La Torre Especial', 'price' => 'R$ 52,00', 'description' => 'Molho especial, carne seca, bacon, catupiry, cebola roxa, rúcula e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza La Torre Especial', 'cardClass' => 'especial'],
            ['id' => 'card-strogonoff', 'badge' => '', 'badgeClass' => '', 'title' => 'Strogonoff', 'price' => 'R$ 45,00', 'description' => 'Molho de tomate, strogonoff de frango, batata palha, mussarela e catupiry', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Strogonoff', 'cardClass' => 'especial'],
            ['id' => 'card-lombo-canadense', 'badge' => '', 'badgeClass' => '', 'title' => 'Lombo Canadense', 'price' => 'R$ 48,00', 'description' => 'Molho de tomate, lombo canadense, catupiry, mussarela e cebola caramelizada', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Lombo Canadense', 'cardClass' => 'especial'],
        ],
    ],
    [
        'id' => 'premium',
        'icon' => '👑',
        'title' => 'Pizzas Premium',
        'description' => 'Para momentos especiais',
        'items' => [
            ['id' => 'card-filé-mignon', 'badge' => 'Premium', 'badgeClass' => 'premium-badge', 'title' => 'Filé Mignon', 'price' => 'R$ 58,00', 'description' => 'Molho especial, filé mignon em tiras, champignon, catupiry e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Filé Mignon', 'cardClass' => 'premium'],
            ['id' => 'card-salmao', 'badge' => 'Premium', 'badgeClass' => 'premium-badge', 'title' => 'Salmão', 'price' => 'R$ 62,00', 'description' => 'Cream cheese, salmão defumado, alcaparras, cebola roxa e cebolinha', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Salmão', 'cardClass' => 'premium'],
            ['id' => 'card-costela', 'badge' => 'Premium', 'badgeClass' => 'premium-badge', 'title' => 'Costela Desfiada', 'price' => 'R$ 55,00', 'description' => 'Molho barbecue, costela desfiada, cebola caramelizada, catupiry e mussarela', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Costela Desfiada', 'cardClass' => 'premium'],
            ['id' => 'card-parma', 'badge' => '', 'badgeClass' => '', 'title' => 'Parma com Rúcula', 'price' => 'R$ 56,00', 'description' => 'Molho de tomate, presunto parma, rúcula fresca, tomate seco e parmesão', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Parma com Rúcula', 'cardClass' => 'premium'],
        ],
    ],
    [
        'id' => 'doces',
        'icon' => '🍫',
        'title' => 'Pizzas Doces',
        'description' => 'Sobremesas irresistíveis',
        'items' => [
            ['id' => 'card-chocolate', 'badge' => 'Doce', 'badgeClass' => 'doce-badge', 'title' => 'Chocolate', 'price' => 'R$ 38,00', 'description' => 'Chocolate ao leite derretido, granulado e leite condensado', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Chocolate', 'cardClass' => 'doce'],
            ['id' => 'card-prestigio', 'badge' => '', 'badgeClass' => '', 'title' => 'Prestígio', 'price' => 'R$ 40,00', 'description' => 'Chocolate ao leite, coco ralado e leite condensado', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Prestígio', 'cardClass' => 'doce'],
            ['id' => 'card-romeu-julieta', 'badge' => 'Favorita', 'badgeClass' => 'bestseller', 'title' => 'Romeu e Julieta', 'price' => 'R$ 40,00', 'description' => 'Goiabada cremosa, queijo mussarela e leite condensado', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Romeu e Julieta', 'cardClass' => 'doce'],
            ['id' => 'card-banana-canela', 'badge' => '', 'badgeClass' => '', 'title' => 'Banana c/ Canela', 'price' => 'R$ 38,00', 'description' => 'Banana caramelizada, canela, açúcar e leite condensado', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza de Banana com Canela', 'cardClass' => 'doce'],
            ['id' => 'card-ninho-nutella', 'badge' => '', 'badgeClass' => '', 'title' => 'Ninho c/ Nutella', 'price' => 'R$ 45,00', 'description' => 'Creme de leite ninho, Nutella, leite condensado e morangos', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Ninho com Nutella', 'cardClass' => 'doce'],
            ['id' => 'card-sensacao', 'badge' => '', 'badgeClass' => '', 'title' => 'Sensação', 'price' => 'R$ 42,00', 'description' => 'Chocolate ao leite, morangos fatiados e leite condensado', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma pizza Sensação', 'cardClass' => 'doce'],
        ],
    ],
    [
        'id' => 'bebidas',
        'icon' => '🥤',
        'title' => 'Bebidas',
        'description' => 'Para acompanhar sua pizza',
        'items' => [
            ['id' => 'card-coca-lata', 'badge' => '', 'badgeClass' => '', 'title' => 'Coca-Cola Lata', 'price' => 'R$ 6,00', 'description' => '350ml', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma Coca-Cola Lata', 'cardClass' => 'bebida'],
            ['id' => 'card-coca-2l', 'badge' => '', 'badgeClass' => '', 'title' => 'Coca-Cola 2L', 'price' => 'R$ 14,00', 'description' => '2 litros', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma Coca-Cola 2L', 'cardClass' => 'bebida'],
            ['id' => 'card-guarana-lata', 'badge' => '', 'badgeClass' => '', 'title' => 'Guaraná Lata', 'price' => 'R$ 5,00', 'description' => '350ml', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Guaraná Lata', 'cardClass' => 'bebida'],
            ['id' => 'card-guarana-2l', 'badge' => '', 'badgeClass' => '', 'title' => 'Guaraná 2L', 'price' => 'R$ 12,00', 'description' => '2 litros', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Guaraná 2L', 'cardClass' => 'bebida'],
            ['id' => 'card-suco-natural', 'badge' => '', 'badgeClass' => '', 'title' => 'Suco Natural', 'price' => 'R$ 10,00', 'description' => '500ml - Diversos sabores', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Suco Natural', 'cardClass' => 'bebida'],
            ['id' => 'card-agua', 'badge' => '', 'badgeClass' => '', 'title' => 'Água Mineral', 'price' => 'R$ 4,00', 'description' => '500ml - Com ou sem gás', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir uma Água Mineral', 'cardClass' => 'bebida'],
        ],
    ],
    [
        'id' => 'sorvetes',
        'icon' => '🍨',
        'title' => 'Sorvetes',
        'description' => 'Refrescância em cada colherada',
        'items' => [
            ['id' => 'card-sorvete-1bola', 'badge' => '', 'badgeClass' => '', 'title' => '1 Bola', 'price' => 'R$ 8,00', 'description' => 'Escolha seu sabor favorito: chocolate, morango, baunilha, creme, flocos e muito mais', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um sorvete de 1 bola', 'cardClass' => 'sorvete'],
            ['id' => 'card-sorvete-2bolas', 'badge' => 'Popular', 'badgeClass' => '', 'title' => '2 Bolas', 'price' => 'R$ 14,00', 'description' => 'Combine dois sabores da nossa seleção especial com cobertura à sua escolha', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um sorvete de 2 bolas', 'cardClass' => 'sorvete'],
            ['id' => 'card-sorvete-3bolas', 'badge' => '', 'badgeClass' => '', 'title' => '3 Bolas', 'price' => 'R$ 18,00', 'description' => 'Três sabores com cobertura, chantilly, granulado e canudo', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um sorvete de 3 bolas', 'cardClass' => 'sorvete'],
            ['id' => 'card-sundae', 'badge' => 'Imperdível', 'badgeClass' => 'bestseller', 'title' => 'Sundae Especial', 'price' => 'R$ 22,00', 'description' => '3 bolas, calda quente de chocolate, chantilly, castanhas, granulado e cereja', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Sundae Especial', 'cardClass' => 'sorvete'],
            ['id' => 'card-milkshake', 'badge' => '', 'badgeClass' => '', 'title' => 'Milkshake', 'price' => 'R$ 18,00', 'description' => '500ml - Chocolate, morango, baunilha ou Ovomaltine com chantilly', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Milkshake', 'cardClass' => 'sorvete'],
            ['id' => 'card-acai', 'badge' => '', 'badgeClass' => '', 'title' => 'Açaí 500ml', 'price' => 'R$ 20,00', 'description' => 'Açaí cremoso com granola, banana, leite condensado e leite em pó', 'link' => 'https://wa.me/5599142-8625?text=Olá! Gostaria de pedir um Açaí 500ml', 'cardClass' => 'sorvete'],
        ],
    ],
];

$infoItems = [
    ['icon' => '🛵', 'title' => 'Delivery', 'text' => 'Entrega rápida na sua casa'],
    ['icon' => '💳', 'title' => 'Pagamento', 'text' => 'Dinheiro, Pix, Cartão'],
    ['icon' => '⏰', 'title' => 'Horário', 'text' => 'Terça a Domingo - 18h às 23h'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Torre Pizzaria e Sorveteria | Cardápio</title>
    <meta name="description" content="Cardápio da La Torre Pizzaria e Sorveteria. Pizzas artesanais, sorvetes e muito mais. De Terça a Domingo a partir das 18h. Peça pelo WhatsApp!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="https://wa.me/5599142-8625" target="_blank" class="whatsapp-float" id="whatsapp-float" aria-label="Fale conosco pelo WhatsApp">
        <svg viewBox="0 0 32 32" fill="currentColor">
            <path d="M16.004 0C7.165 0 .003 7.161.003 16c0 2.822.736 5.575 2.137 8.004L.003 32l8.203-2.1A15.95 15.95 0 0016.004 32C24.843 32 32 24.839 32 16S24.843 0 16.004 0zm0 29.09a13.04 13.04 0 01-6.65-1.817l-.477-.284-4.94 1.296 1.32-4.822-.311-.495A13.03 13.03 0 012.913 16c0-7.218 5.873-13.09 13.09-13.09 3.496 0 6.782 1.362 9.253 3.833a13.01 13.01 0 013.834 9.257c0 7.218-5.873 13.09-13.086 13.09zm7.175-9.802c-.393-.197-2.326-1.148-2.687-1.279-.361-.131-.624-.197-.886.197-.263.393-1.018 1.279-1.248 1.541-.23.263-.46.296-.853.098-.393-.197-1.66-.612-3.162-1.95-1.169-1.041-1.958-2.327-2.188-2.72-.23-.394-.025-.607.173-.803.177-.177.393-.46.59-.69.197-.23.263-.394.394-.657.131-.263.066-.493-.033-.69-.098-.197-.886-2.137-1.214-2.924-.32-.768-.645-.663-.886-.676l-.755-.013c-.263 0-.69.098-1.051.493-.361.394-1.379 1.348-1.379 3.286 0 1.938 1.412 3.81 1.609 4.072.197.263 2.78 4.244 6.733 5.953.94.406 1.675.649 2.248.83.944.3 1.804.258 2.483.157.758-.113 2.326-.951 2.654-1.87.329-.918.329-1.705.23-1.87-.098-.164-.361-.263-.755-.46z" />
        </svg>
        <span class="whatsapp-tooltip">Peça pelo WhatsApp!</span>
    </a>

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
                    <a href="https://wa.me/5599142-8625" class="phone-link">
                        <span class="whatsapp-icon-small">📱</span> 99142-8625
                    </a>
                    <a href="tel:991429922" class="phone-link">
                        <span class="whatsapp-icon-small">📞</span> 99142-9922
                    </a>
                </div>
            </div>
            <nav class="menu-nav" id="menu-nav">
                <a href="#tradicionais" class="nav-pill active" data-category="tradicionais">Tradicionais</a>
                <a href="#especiais" class="nav-pill" data-category="especiais">Especiais</a>
                <a href="#premium" class="nav-pill" data-category="premium">Premium</a>
                <a href="#doces" class="nav-pill" data-category="doces">Doces</a>
                <a href="#bebidas" class="nav-pill" data-category="bebidas">Bebidas</a>
                <a href="#sorvetes" class="nav-pill" data-category="sorvetes">Sorvetes</a>
            </nav>
        </div>
        <div class="hero-scroll-indicator">
            <span>Ver Cardápio</span>
            <div class="scroll-arrow">▼</div>
        </div>
    </header>

    <main class="menu-container" id="menu-container">
        <?php foreach ($sections as $section): ?>
            <section class="menu-section" id="<?= htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="section-header">
                    <div class="section-icon"><?= htmlspecialchars($section['icon'], ENT_QUOTES, 'UTF-8') ?></div>
                    <h2 class="section-title"><?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="section-desc"><?= htmlspecialchars($section['description'], ENT_QUOTES, 'UTF-8') ?></p>
                    <div class="section-divider"></div>
                </div>
                <div class="menu-grid<?= ($section['id'] === 'bebidas') ? ' bebidas-grid' : '' ?>">
                    <?php foreach ($section['items'] as $item): ?>
                        <article class="menu-card<?= !empty($item['cardClass']) ? ' ' . htmlspecialchars($item['cardClass'], ENT_QUOTES, 'UTF-8') : '' ?>" id="<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <?php if (!empty($item['badge'])): ?>
                                <div class="card-badge<?= !empty($item['badgeClass']) ? ' ' . htmlspecialchars($item['badgeClass'], ENT_QUOTES, 'UTF-8') : '' ?>"><?= htmlspecialchars($item['badge'], ENT_QUOTES, 'UTF-8') ?></div>
                            <?php endif; ?>
                            <div class="card-header">
                                <h3 class="card-title"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                                <span class="card-price"><?= htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <p class="card-desc"><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></p>
                            <div class="card-footer">
                                <?php if ($section['id'] === 'bebidas'): ?>
                                    <a href="<?= htmlspecialchars($item['link'], ENT_QUOTES, 'UTF-8') ?>" class="card-order" target="_blank">Pedir</a>
                                <?php else: ?>
                                    <span class="card-size">🍕 Grande</span>
                                    <a href="<?= htmlspecialchars($item['link'], ENT_QUOTES, 'UTF-8') ?>" class="card-order" target="_blank">Pedir</a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <section class="info-banner" id="info-banner">
            <div class="info-content">
                <?php foreach ($infoItems as $info): ?>
                    <div class="info-item">
                        <span class="info-icon"><?= htmlspecialchars($info['icon'], ENT_QUOTES, 'UTF-8') ?></span>
                        <div>
                            <h3><?= htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p><?= htmlspecialchars($info['text'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

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
                <a href="https://wa.me/5599142-8625?text=Olá! Gostaria de fazer um pedido" class="footer-whatsapp-btn" target="_blank">
                    Fazer Pedido pelo WhatsApp
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 La Torre Pizzaria e Sorveteria. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>