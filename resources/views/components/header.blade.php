@props([
'showMenuToggle' => true,
])

<header x-data="{ open: false }"
    class="fixed inset-x-0 top-0 z-50 border-b border-white/60 bg-white/80 backdrop-blur-xl">
    <div class="container-shell">
        <div class="flex h-20 items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-green via-brand-yellow to-brand-red text-base font-black text-white shadow-lg shadow-brand-green/20">
                    <i class="fa-solid fa-pizza-slice"></i>
                </div>
                <div>
                    <p class="text-base font-semibold tracking-tight text-brand-bg">La Torre</p>
                    <p class="text-xs font-medium text-brand-ink/65">Pizzaria e Sorveteria</p>
                </div>
            </a>

            <nav class="hidden items-center gap-3 md:flex">
                <a href="{{ route('menu.index') }}" class="menu-chip">
                    <i class="fa-solid fa-list"></i>
                    Cardápio
                </a>
                <a href="https://wa.me/5591999999999" target="_blank" rel="noopener"
                    class="menu-floating-button px-4 py-2">
                    <i class="fa-brands fa-whatsapp"></i>
                    WhatsApp
                </a>
            </nav>

            @if ($showMenuToggle)
            <button type="button" x-on:click="open = !open"
                class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-brand-wood/15 bg-white text-brand-bg shadow-lg md:hidden"
                aria-label="Abrir menu">
                <i x-show="!open" class="fa-solid fa-bars"></i>
                <i x-show="open" x-cloak class="fa-solid fa-xmark"></i>
            </button>
            @endif
        </div>

        <div x-show="open" x-cloak x-transition class="pb-4 md:hidden">
            <div class="surface-card space-y-2 p-3">
                <a href="{{ route('menu.index') }}" class="menu-chip w-full justify-center">
                    <i class="fa-solid fa-list"></i>
                    Ver cardápio completo
                </a>
                <a href="https://wa.me/5591999999999" target="_blank" rel="noopener"
                    class="menu-floating-button w-full justify-center">
                    <i class="fa-brands fa-whatsapp"></i>
                    Pedir no WhatsApp
                </a>
            </div>
        </div>
    </div>
</header>