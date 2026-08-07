@props([
'product',
])

@php
$payload = [
'id' => $product->id,
'name' => $product->name,
'category' => [
'name' => $product->category->name,
'slug' => $product->category->slug,
],
'image' => $product->image,
'description' => $product->description,
'short_description' => $product->short_description,
'ingredients' => $product->ingredients ?? [],
'is_pizza' => (bool) $product->is_pizza,
'prices' => $product->prices->map(fn ($price) => [
'label' => $price->label,
'price' => number_format((float) $price->price, 2, ',', '.'),
'value' => (float) $price->price,
])->values()->all(),
'base_price' => $product->base_price !== null ? number_format((float) $product->base_price, 2, ',', '.') : null,
];

$defaultPrice = $product->base_price ?? $product->prices->first()?->price;
@endphp

<article x-data="{ productPayload: @js($payload) }"
    x-show="typeof matches === 'function' ? matches(productPayload) : true" x-transition
    class="group menu-section-card flex h-full flex-col transition hover:-translate-y-1 hover:shadow-2xl">
    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="1000" height="700" loading="lazy"
        class="h-44 w-full object-cover sm:h-48">

    <div class="flex flex-1 flex-col space-y-4 p-4 md:p-5">
        <span class="menu-badge self-start bg-brand-green/10 text-brand-green">
            {{ $product->category->name }}
        </span>

        <div>
            <h3 class="menu-title text-xl font-black text-brand-bg">{{ $product->name }}</h3>
            <p class="menu-description mt-1 text-sm leading-6 text-brand-ink/75">{{ $product->short_description }}</p>
        </div>

        <div class="mt-auto flex items-end justify-between gap-3">
            <p class="menu-value text-base font-black text-brand-red">
                @if ($defaultPrice)
                R$ {{ number_format((float) $defaultPrice, 2, ',', '.') }}
                @else
                Consulte
                @endif
            </p>

            <button type="button" x-on:click="$dispatch('open-product', productPayload)"
                class="inline-flex items-center gap-2 rounded-full border border-brand-green/20 bg-brand-green/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-brand-green transition hover:bg-brand-green hover:text-white">
                Ver detalhes
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
</article>