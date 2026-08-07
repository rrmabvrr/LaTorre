@props([
'categories' => collect(),
])

<nav class="sticky top-20 z-40 border-y border-white/60 bg-white/85 backdrop-blur-xl">
    <div class="container-shell py-3">
        <ul class="flex gap-2 overflow-x-auto pb-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            @foreach ($categories as $category)
            <li class="shrink-0">
                <a href="#{{ $category->slug }}" data-smooth-scroll class="menu-chip">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>