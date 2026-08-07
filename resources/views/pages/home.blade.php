<x-layouts.app title="Pizzaria La Torre | A pizza que reúne toda a família"
    description="Conheça o cardápio online da Pizzaria La Torre com pizzas artesanais, sorvetes, sucos naturais e delivery rápido.">
    <x-header />

    <main class="pb-16">
        <x-hero />

        <section class="container-shell mt-8">
            <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                <div class="surface-card animate-rise p-4 text-center">
                    <p class="text-2xl">🍕</p>
                    <p class="mt-2 text-sm font-bold text-brand-bg">Pizzas Artesanais</p>
                </div>
                <div class="surface-card animate-rise p-4 text-center" style="animation-delay: 0.05s">
                    <p class="text-2xl">🍦</p>
                    <p class="mt-2 text-sm font-bold text-brand-bg">Sorvetes</p>
                </div>
                <div class="surface-card animate-rise p-4 text-center" style="animation-delay: 0.1s">
                    <p class="text-2xl">🥤</p>
                    <p class="mt-2 text-sm font-bold text-brand-bg">Bebidas</p>
                </div>
                <div class="surface-card animate-rise p-4 text-center" style="animation-delay: 0.15s">
                    <p class="text-2xl">🚴</p>
                    <p class="mt-2 text-sm font-bold text-brand-bg">Delivery</p>
                </div>
            </div>

            <div class="mt-5 flex flex-wrap items-center gap-3">
                <x-store-status />
                <a href="{{ route('menu.index') }}" class="btn-primary">Explorar Cardápio Completo</a>
            </div>
        </section>

        <section class="mt-8">
            <x-category-navigation :categories="$categories" />
        </section>

        <section class="container-shell mt-8 space-y-10">
            @foreach ($categories as $category)
            <section id="{{ $category->slug }}" class="scroll-mt-36 space-y-5">
                <x-category-card :category="$category" />

                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach ($category->products->take(3) as $product)
                    <x-product-card :product="$product" />
                    @endforeach
                </div>
            </section>
            @endforeach
        </section>

        <section class="container-shell mt-12">
            <div class="surface-card overflow-hidden p-6 md:p-8">
                <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
                    <div>
                        <h2 class="section-title text-brand-bg">Seu pedido em poucos cliques</h2>
                        <p class="mt-2 text-sm text-brand-ink/75 md:text-base">Acesse o cardápio completo, pesquise por
                            ingrediente e veja todos os detalhes dos produtos.</p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('menu.index') }}" class="btn-primary">VER CARDÁPIO</a>
                        <a href="https://wa.me/5591999999999" target="_blank" rel="noopener" class="btn-secondary">PEDIR
                            NO WHATSAPP</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
    <x-whats-app-button />
</x-layouts.app>