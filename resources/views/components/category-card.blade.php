@props([
'category',
])

<div class="menu-section-card lg:grid lg:grid-cols-[1.05fr_0.95fr]">
    <div class="relative min-h-52 overflow-hidden bg-brand-green">
        <img src="{{ $category->cover_image }}" alt="{{ $category->name }}" width="1200" height="540" loading="lazy"
            class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent"></div>
        <div class="absolute left-4 top-4">
            <span class="menu-badge bg-white/90 text-brand-bg">
                <i class="fa-solid fa-utensils"></i>
                Categoria
            </span>
        </div>
        <div class="absolute bottom-4 left-4 right-4">
            <h2 class="menu-title text-3xl font-black text-white drop-shadow-lg md:text-4xl">{{ $category->name }}</h2>
        </div>
    </div>

    <div class="space-y-4 p-5 md:p-6">
        <p class="menu-description text-sm leading-6 text-brand-ink/75 md:text-base">{{ $category->description }}</p>

        <div class="flex flex-wrap gap-2">
            <span class="pill-chip"><i class="fa-solid fa-circle-check text-brand-green"></i> Visual moderno</span>
            <span class="pill-chip"><i class="fa-solid fa-mobile-screen-button text-brand-red"></i> Mobile first</span>
        </div>
    </div>
</div>