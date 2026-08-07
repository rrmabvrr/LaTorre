@props([
'categories' => collect(),
])

<section class="menu-section-card menu-panel p-4 md:p-5">
    <div class="grid gap-4 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-center">
        <div class="relative">
            <i
                class="fa-solid fa-magnifying-glass pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-brand-ink/45"></i>

            <input x-model.debounce.150ms="query" type="search"
                placeholder="Pesquisar por nome, ingrediente ou categoria..."
                class="w-full rounded-2xl border border-brand-wood/15 bg-white/90 py-3.5 pl-12 pr-4 text-sm font-medium text-brand-ink outline-none transition placeholder:text-brand-ink/45 focus:border-brand-green/40 focus:ring-4 focus:ring-brand-green/10">
        </div>

        <div class="flex items-center gap-2 overflow-x-auto pb-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <button type="button" x-on:click="activeCategory = 'all'"
                x-bind:class="activeCategory === 'all' ? 'menu-chip-active' : 'menu-chip'" class="shrink-0">
                <i class="fa-solid fa-border-all"></i>
                Todas
            </button>

            @foreach ($categories as $category)
            <button type="button" x-on:click="activeCategory = '{{ $category->slug }}'"
                x-bind:class="activeCategory === '{{ $category->slug }}' ? 'menu-chip-active' : 'menu-chip'"
                class="shrink-0">
                {{ $category->name }}
            </button>
            @endforeach
        </div>
    </div>
</section>