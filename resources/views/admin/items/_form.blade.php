@php
    $pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
    $sizeCategories = ['tradicionais', 'especiais', 'nobres', 'sucos_naturais'];
    $selectedCategory = old('category', $item->category ?? null);
    $sizeKeys = in_array($selectedCategory, $pizzaCategories, true)
        ? ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG']
        : (in_array($selectedCategory, ['sucos_naturais'], true)
            ? ['COPO', 'JARRA', 'ADICIONAL DE LEITE']
            : []);
    $sizes = old('sizes', $item->sizes ?? array_fill_keys($sizeKeys, null));
@endphp

@csrf
<div class="grid">
    <div class="field">
        <label for="name">Nome do item</label>
        <input id="name" name="name" type="text" value="{{ old('name', $item->name) }}" maxlength="120" required>
    </div>

    <div class="field">
        <label for="description">Descrição</label>
        <textarea id="description" name="description" rows="3" maxlength="1200">{{ old('description', $item->description) }}</textarea>
    </div>

    <div class="field">
        <label for="category">Categoria</label>
        <select id="category" name="category" required>
            @foreach ($categories as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $item->category) === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="field" id="priceField" style="display: {{ in_array($selectedCategory, $sizeCategories, true) ? 'none' : 'block' }};">
        <label for="price">Preço (R$)</label>
        <input id="price" name="price" type="number" value="{{ old('price', $item->price) }}" min="0" step="0.01" @required(!in_array($selectedCategory, $sizeCategories, true))>
    </div>

    <div class="field" id="sizeValuesField" style="display: {{ in_array($selectedCategory, $sizeCategories, true) ? 'block' : 'none' }};">
        <label>{{ in_array($selectedCategory, $pizzaCategories, true) ? 'Tamanhos e valores da pizza' : 'Opções e valores do suco natural' }}</label>
        <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; margin-top: 8px;">
            @foreach ($sizeKeys as $size)
                <div class="field" style="margin:0;">
                    <label for="sizes_{{ $size }}">{{ $size }}</label>
                    <input id="sizes_{{ $size }}" name="sizes[{{ $size }}]" type="number" min="0" step="0.01"
                        value="{{ old('sizes.' . $size, $sizes[$size] ?? '') }}" placeholder="0,00">
                </div>
            @endforeach
        </div>
    </div>

    <div class="field">
        <label for="display_order">Ordem de exibicao</label>
        <input id="display_order" name="display_order" type="number" value="{{ old('display_order', $item->display_order ?? 0) }}" min="0" max="9999" required>
    </div>

    <label for="is_available" style="display:flex;align-items:center;gap:8px;">
        <input id="is_available" name="is_available" type="checkbox" value="1"
            @checked(old('is_available', $item->is_available ?? true))>
        Disponível no cardápio
    </label>

    <div class="actions-inline">
        <button class="btn btn-primary" type="submit">Salvar</button>
        <a class="btn" href="{{ route('admin.items.index') }}">Cancelar</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('category');
        const priceField = document.getElementById('priceField');
        const sizeValuesField = document.getElementById('sizeValuesField');
        const priceInput = document.getElementById('price');

        if (!categorySelect) {
            return;
        }

        const sizeCategories = ['tradicionais', 'especiais', 'nobres', 'sucos_naturais'];

        const toggleFields = () => {
            const requiresSizeValues = sizeCategories.includes(categorySelect.value);

            if (priceField) {
                priceField.style.display = requiresSizeValues ? 'none' : 'block';
            }

            if (sizeValuesField) {
                sizeValuesField.style.display = requiresSizeValues ? 'block' : 'none';
            }

            if (priceInput && requiresSizeValues) {
                priceInput.removeAttribute('required');
            }

            if (priceInput && !requiresSizeValues) {
                priceInput.setAttribute('required', 'required');
            }
        };

        categorySelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
