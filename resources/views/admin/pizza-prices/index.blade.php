@extends('admin.app')

@section('title', 'Preços por Categoria de Pizzas')

@section('content')
<div class="card page-head">
    <div>
        <h1 style="margin:0;">Preços por Categoria de Pizzas</h1>
        <p class="muted" style="margin:6px 0 0;">Defina os valores de cada tamanho (Média, Grande, Família, Big). Ao salvar, os novos preços serão aplicados a todas as pizzas da respectiva categoria.</p>
    </div>
    <div class="actions-inline" style="flex-direction: row; gap: 8px;">
        <a class="btn" href="{{ route('admin.items.index') }}">← Voltar para Itens</a>
    </div>
</div>

<div class="grid" style="gap: 16px;">
    @foreach ($categoriesData as $categoryKey => $category)
    <div class="card category-price-card">
        <form method="POST" action="{{ route('admin.pizza-prices.update', $categoryKey) }}">
            @csrf
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                <div>
                    <h2 style="margin:0; font-size: 19px; color: var(--accent); display: flex; align-items: center; gap: 6px;">
                        @if($categoryKey === 'tradicionais') 🍕
                        @elseif($categoryKey === 'especiais') ⭐
                        @elseif($categoryKey === 'nobres') 👑
                        @endif
                        <span>{{ $category['label'] }}</span>
                    </h2>
                    <span class="muted" style="font-size: 13px;">
                        {{ $category['item_count'] }} {{ $category['item_count'] === 1 ? 'pizza cadastrada' : 'pizzas cadastradas' }} nesta categoria
                    </span>
                </div>
                <button type="submit" class="btn btn-primary" style="width: auto;">
                    Salvar Preços de {{ $category['label'] }}
                </button>
            </div>

            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px; margin-bottom: 14px;">
                @foreach ($sizes as $size)
                <div class="field" style="margin:0;">
                    <label for="sizes_{{ $categoryKey }}_{{ $size }}">Tamanho {{ $size }} (R$)</label>
                    <input type="number" step="0.01" min="0" 
                           id="sizes_{{ $categoryKey }}_{{ $size }}" 
                           name="sizes[{{ $size }}]" 
                           value="{{ old('sizes.' . $size, isset($category['sizes'][$size]) ? number_format((float)$category['sizes'][$size], 2, '.', '') : '') }}" 
                           placeholder="0,00" 
                           required>
                </div>
                @endforeach
            </div>

            @if ($category['items']->isNotEmpty())
            <details style="margin-top: 8px; font-size: 13px; color: var(--muted); border-top: 1px dashed var(--border); padding-top: 10px;">
                <summary style="cursor: pointer; font-weight: 600;">Ver pizzas afetadas ({{ $category['item_count'] }})</summary>
                <div style="margin-top: 8px; display: flex; flex-wrap: wrap; gap: 6px;">
                    @foreach ($category['items'] as $item)
                        <span style="background: #f0ede6; padding: 4px 10px; border-radius: 6px; font-size: 13px; color: var(--text);">
                            {{ $item->name }}
                        </span>
                    @endforeach
                </div>
            </details>
            @endif
        </form>
    </div>
    @endforeach
</div>
@endsection
