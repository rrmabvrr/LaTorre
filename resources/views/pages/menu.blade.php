@php
$sorvete = optional($categories->firstWhere('slug', 'sorvetes'))->products?->first();
$sucos = optional($categories->firstWhere('slug', 'sucos-naturais'))->products ?? collect();
$tiraGosto = optional($categories->firstWhere('slug', 'tira-gosto'))->products ?? collect();
$bebidas = optional($categories->firstWhere('slug', 'bebidas'))->products ?? collect();
$cervejas = optional($categories->firstWhere('slug', 'cervejas'))->products ?? collect();
@endphp

@php
$totalCategories = $categories->count();
$totalProducts = $products->count();
$featuredProducts = $products->take(3);
@endphp

<x-layouts.app title="Cardápio Público | Pizzaria La Torre"
    description="Cardápio online da Pizzaria La Torre com pesquisa instantânea, categorias e detalhes completos de pizzas, bebidas e sobremesas.">
    <div x-data="menuPage(@js($products))" x-on:open-product.window="openModal($event.detail)" class="min-h-screen">
        <x-header />

        <main class="pb-16 pt-24 md:pt-28">
            <section class="container-shell">
                <div class="menu-section-card overflow-hidden">
                    <div class="grid lg:grid-cols-[1.12fr_0.88fr]">
                        <div class="menu-panel space-y-6 p-6 md:p-8 lg:p-10">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="menu-badge">
                                    <i class="fa-solid fa-wine-glass"></i>
                                    Cardápio italiano
                                </span>
                                <span class="pill-chip bg-white/85 text-xs font-semibold text-brand-green">
                                    <i class="fa-solid fa-mobile-screen-button text-brand-red"></i>
                                    Mobile first
                                </span>
                            </div>

                            <div class="space-y-4">
                                <p
                                    class="menu-subtitle text-sm font-bold uppercase tracking-[0.35em] text-brand-red/80">
                                    Pizzaria La Torre</p>
                                <h1 class="menu-title text-4xl font-black text-brand-bg md:text-6xl">
                                    Sabor artesanal com uma vitrine moderna, limpa e rápida de navegar.
                                </h1>
                                <p class="menu-description max-w-2xl text-base leading-7 text-brand-ink/72 md:text-lg">
                                    Explore pizzas, sorvetes, bebidas e entradas em uma experiência visual inspirada na
                                    Itália, feita para funcionar bem no celular e no desktop.
                                </p>
                            </div>

                            <div class="grid gap-3 sm:grid-cols-3">
                                <div class="menu-stat">
                                    <div class="flex items-start gap-3">
                                        <span class="menu-stat-icon"><i class="fa-solid fa-pizza-slice"></i></span>
                                        <div>
                                            <p
                                                class="text-xs font-semibold uppercase tracking-[0.22em] text-brand-ink/55">
                                                Categorias</p>
                                            <p class="menu-title mt-1 text-2xl font-black text-brand-bg">{{
                                                $totalCategories }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-stat">
                                    <div class="flex items-start gap-3">
                                        <span class="menu-stat-icon bg-brand-red/10 text-brand-red"><i
                                                class="fa-solid fa-bowl-food"></i></span>
                                        <div>
                                            <p
                                                class="text-xs font-semibold uppercase tracking-[0.22em] text-brand-ink/55">
                                                Itens</p>
                                            <p class="menu-title mt-1 text-2xl font-black text-brand-bg">{{
                                                $totalProducts }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-stat">
                                    <div class="flex items-start gap-3">
                                        <span class="menu-stat-icon bg-brand-yellow/15 text-brand-wood"><i
                                                class="fa-solid fa-circle-check"></i></span>
                                        <div>
                                            <p
                                                class="text-xs font-semibold uppercase tracking-[0.22em] text-brand-ink/55">
                                                Acesso</p>
                                            <p class="menu-title mt-1 text-2xl font-black text-brand-bg">Rápido</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-3">
                                <a href="#lista-cardapio" class="btn-primary">
                                    <i class="fa-solid fa-utensils"></i>
                                    Ver pratos
                                </a>
                                <a href="https://wa.me/5591999999999" target="_blank" rel="noopener"
                                    class="btn-secondary">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    Pedir no WhatsApp
                                </a>
                            </div>
                        </div>

                        <div
                            class="relative overflow-hidden bg-[linear-gradient(160deg,#1f7a4a_0%,#f5efe4_52%,#c62828_100%)] p-6 md:p-8 lg:p-10">
                            <div
                                class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.25),transparent_28%),radial-gradient(circle_at_bottom_left,rgba(255,255,255,0.18),transparent_30%)]">
                            </div>

                            <div class="relative flex h-full flex-col justify-between gap-6">
                                <div class="flex items-center justify-between gap-4">
                                    <div
                                        class="rounded-full bg-white/20 px-4 py-2 text-sm font-semibold text-white backdrop-blur">
                                        <i class="fa-solid fa-location-dot mr-2"></i>
                                        Delivery e retirada
                                    </div>
                                    <div class="rounded-full bg-white/20 p-3 text-white backdrop-blur">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <div
                                    class="space-y-3 rounded-[1.75rem] border border-white/35 bg-white/92 p-5 shadow-2xl backdrop-blur">
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-brand-green">Seleção
                                        em destaque</p>
                                    <div class="grid gap-3">
                                        @foreach ($featuredProducts as $product)
                                        <div class="flex items-center gap-3 rounded-2xl bg-brand-paper/75 p-3">
                                            <img src="{{ data_get($product, 'image') }}"
                                                alt="{{ data_get($product, 'name') }}" width="112" height="84"
                                                loading="lazy" class="h-16 w-16 rounded-2xl object-cover">
                                            <div class="min-w-0 flex-1">
                                                <p class="truncate text-sm font-semibold text-brand-bg">{{
                                                    data_get($product, 'name') }}</p>
                                                <p class="truncate text-xs text-brand-ink/60">{{ data_get($product,
                                                    'short_description') }}</p>
                                            </div>
                                            <i class="fa-solid fa-chevron-right text-brand-green"></i>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-3 text-center text-white">
                                    <div class="rounded-2xl bg-white/16 p-3 backdrop-blur">
                                        <i class="fa-solid fa-fire-burner text-brand-yellow"></i>
                                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.2em]">Forno</p>
                                    </div>
                                    <div class="rounded-2xl bg-white/16 p-3 backdrop-blur">
                                        <i class="fa-solid fa-ice-cream text-brand-yellow"></i>
                                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.2em]">Sobremesas</p>
                                    </div>
                                    <div class="rounded-2xl bg-white/16 p-3 backdrop-blur">
                                        <i class="fa-solid fa-martini-glass text-brand-yellow"></i>
                                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.2em]">Bebidas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-shell mt-6">
                <x-search-bar :categories="$categories" />
            </section>

            <section class="mt-8">
                <x-category-navigation :categories="$categories" />
            </section>

            <section id="lista-cardapio" class="container-shell mt-8 space-y-10">
                @foreach ($categories as $category)
                <section id="{{ $category->slug }}" class="scroll-mt-36 space-y-4"
                    x-show="categoryHasMatches('{{ $category->slug }}')" x-transition>
                    <x-category-card :category="$category" />

                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach ($category->products as $product)
                        <x-product-card :product="$product" />
                        @endforeach
                    </div>
                </section>
                @endforeach

                <div x-show="filteredProducts.length === 0" class="menu-section-card p-8 text-center" x-cloak>
                    <p class="text-lg font-bold text-brand-bg">Nenhum item encontrado</p>
                    <p class="mt-2 text-sm text-brand-ink/70">Tente outro termo, ingrediente ou categoria.</p>
                </div>
            </section>

            @if ($sorvete)
            <section class="container-shell mt-12">
                <div class="menu-section-card overflow-hidden">
                    <div class="grid gap-6 p-5 md:grid-cols-2 md:items-center md:p-7">
                        <img src="{{ $sorvete->image }}" alt="{{ $sorvete->name }}" width="1200" height="800"
                            loading="lazy" class="h-64 w-full rounded-2xl object-cover">
                        <div class="space-y-3">
                            <p class="menu-badge w-fit"><i class="fa-solid fa-ice-cream"></i> Destaque Sorvetes</p>
                            <h2 class="menu-title text-3xl font-black text-brand-bg">Sorvete por bola</h2>
                            <p class="menu-description text-sm text-brand-ink/75">Sabores selecionados diariamente com
                                textura cremosa.</p>
                            <p class="menu-value text-3xl font-black text-brand-red">R$ 3,50</p>
                        </div>
                    </div>
                </div>
            </section>
            @endif

            <section class="container-shell mt-12 grid gap-6 xl:grid-cols-2">
                <div class="menu-section-card p-5 md:p-6">
                    <h3 class="wood-strip-title menu-title text-xl md:text-2xl"><i
                            class="fa-solid fa-glass-water text-brand-green"></i> Sucos Naturais</h3>
                    <p class="menu-description mt-2 text-sm text-brand-ink/70">Sabores disponíveis: {{
                        $sucos->pluck('name')->map(fn ($name) => str_replace('Suco de ', '', $name))->implode(', ') }}.
                    </p>

                    <div class="mt-4 overflow-hidden rounded-2xl border border-brand-wood/15 bg-brand-paper/70">
                        <div class="flex items-center justify-between border-b border-brand-wood/10 px-4 py-3">
                            <p class="menu-subtitle text-sm font-semibold">Copo</p>
                            <p class="menu-value font-bold text-brand-red">R$ 7,00</p>
                        </div>
                        <div class="flex items-center justify-between border-b border-brand-wood/10 px-4 py-3">
                            <p class="menu-subtitle text-sm font-semibold">Jarra</p>
                            <p class="menu-value font-bold text-brand-red">R$ 12,00</p>
                        </div>
                        <div class="flex items-center justify-between px-4 py-3">
                            <p class="menu-subtitle text-sm font-semibold">Adicional de leite</p>
                            <p class="menu-value font-bold text-brand-red">R$ 3,00</p>
                        </div>
                    </div>
                </div>

                <div class="menu-section-card p-5 md:p-6">
                    <h3 class="wood-strip-title menu-title text-xl md:text-2xl"><i
                            class="fa-solid fa-drumstick-bite text-brand-red"></i> Tira Gosto</h3>
                    <div class="mt-4 space-y-3">
                        @foreach ($tiraGosto as $item)
                        <div
                            class="flex items-center justify-between rounded-2xl border border-brand-wood/15 bg-white/80 px-4 py-3">
                            <p class="menu-description text-sm font-semibold text-brand-ink">{{ $item->name }}</p>
                            <p class="menu-value text-base font-black text-brand-red">R$ {{ number_format((float)
                                $item->base_price, 2, ',', '.') }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="container-shell mt-6">
                <div class="menu-section-card p-5 md:p-6">
                    <h3 class="wood-strip-title menu-title text-xl md:text-2xl"><i
                            class="fa-solid fa-martini-glass-citrus text-brand-green"></i> Bebidas</h3>

                    <div class="mt-4 grid gap-4 md:grid-cols-3">
                        <div class="rounded-2xl border border-brand-wood/15 bg-brand-paper/60 p-4">
                            <p class="mb-2 wood-strip-subtitle menu-subtitle">Refrigerantes</p>
                            @foreach ($bebidas->reject(fn ($item) => str_starts_with($item->name, 'Água')) as $item)
                            <div class="flex items-center justify-between py-1.5 text-sm">
                                <span class="menu-description">{{ $item->name }}</span>
                                <strong class="menu-value text-brand-red">R$ {{ number_format((float) $item->base_price,
                                    2, ',',
                                    '.') }}</strong>
                            </div>
                            @endforeach
                        </div>

                        <div class="rounded-2xl border border-brand-wood/15 bg-brand-paper/60 p-4">
                            <p class="mb-2 wood-strip-subtitle menu-subtitle">Águas</p>
                            @foreach ($bebidas->filter(fn ($item) => str_starts_with($item->name, 'Água')) as $item)
                            <div class="flex items-center justify-between py-1.5 text-sm">
                                <span class="menu-description">{{ $item->name }}</span>
                                <strong class="menu-value text-brand-red">R$ {{ number_format((float) $item->base_price,
                                    2, ',',
                                    '.') }}</strong>
                            </div>
                            @endforeach
                        </div>

                        <div class="rounded-2xl border border-brand-wood/15 bg-brand-paper/60 p-4">
                            <p class="mb-2 wood-strip-subtitle menu-subtitle">Cervejas</p>
                            @foreach ($cervejas as $item)
                            <div class="flex items-center justify-between py-1.5 text-sm">
                                <span class="menu-description">{{ $item->name }}</span>
                                <strong class="menu-value text-brand-red">R$ {{ number_format((float) $item->base_price,
                                    2, ',',
                                    '.') }}</strong>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <p
                        class="mt-4 rounded-xl border border-brand-red/20 bg-brand-red/10 px-4 py-3 text-sm font-semibold text-brand-red">
                        Venda proibida para menores de 18 anos.
                    </p>
                </div>
            </section>
        </main>

        <x-product-modal />
        <x-footer />
        <x-whats-app-button />
    </div>

    @push('scripts')
    <script>
        function menuPage(products) {
                return {
                    products,
                    filteredProducts: products,
                    query: '',
                    activeCategory: 'all',
                    isProductModalOpen: false,
                    selectedProduct: null,

                    init() {
                        this.$watch('query', () => this.applyFilters());
                        this.$watch('activeCategory', () => this.applyFilters());
                    },

                    applyFilters() {
                        const term = this.query.trim().toLowerCase();

                        this.filteredProducts = this.products.filter((product) => {
                            const byCategory = this.activeCategory === 'all' || product.category.slug === this.activeCategory;

                            if (!byCategory) {
                                return false;
                            }

                            if (!term) {
                                return true;
                            }

                            const source = [
                                product.name,
                                product.short_description,
                                product.category.name,
                                ...(product.ingredients || []),
                            ]
                                .join(' ')
                                .toLowerCase();

                            return source.includes(term);
                        });
                    },

                    matches(product) {
                        return this.filteredProducts.some((item) => item.id === product.id);
                    },

                    categoryHasMatches(slug) {
                        return this.filteredProducts.some((item) => item.category.slug === slug);
                    },

                    openModal(product) {
                        this.selectedProduct = product;
                        this.isProductModalOpen = true;
                        document.body.style.overflow = 'hidden';
                    },

                    closeModal() {
                        this.isProductModalOpen = false;
                        this.selectedProduct = null;
                        document.body.style.overflow = '';
                    },
                };
            }
    </script>
    @endpush
</x-layouts.app>