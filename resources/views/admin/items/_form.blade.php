@php
$pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
$sizeCategories = ['tradicionais', 'especiais', 'nobres', 'sucos_naturais'];
$selectedCategory = old('category', $item->category ?? array_key_first($categories));
$requiresSizeValues = in_array($selectedCategory, $sizeCategories, true);
$isPizzaCategory = in_array($selectedCategory, $pizzaCategories, true);
$sizeKeys = $isPizzaCategory
? ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG']
: (in_array($selectedCategory, ['sucos_naturais'], true)
? ['COPO', 'JARRA']
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
        <textarea id="description" name="description" rows="3"
            maxlength="1200">{{ old('description', $item->description) }}</textarea>
    </div>

    <div class="form-row">
        <div class="field field-category">
            <label for="category">Categoria</label>
            <select id="category" name="category" required>
                @foreach ($categories as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $item->category) === $value)>
                    {{ $label }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="field field-price" id="priceField" @if($requiresSizeValues) style="display: none;" @endif>
            <label for="price">Preço (R$)</label>
            <input id="price" name="price" type="number" value="{{ old('price', $item->price) }}" min="0" step="0.01"
                @required(!$requiresSizeValues)>
        </div>

        <div class="field field-order">
            <label for="display_order">Ordem de exibição</label>
            <input id="display_order" name="display_order" type="number"
                value="{{ old('display_order', $item->display_order ?? 0) }}" min="0" max="9999" required>
        </div>
    </div>

    <div class="field" id="sizeValuesField" @if(!$requiresSizeValues) style="display: none;" @endif>
        <label>{{ $isPizzaCategory ? 'Tamanhos e valores da pizza' : 'Opções e valores do suco natural' }}</label>
        <div class="grid"
            style="grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 12px; margin-top: 8px;">
            @foreach ($sizeKeys as $size)
            <div class="field" style="margin:0;">
                <label for="sizes_{{ $size }}">{{ $size }}</label>
                <input id="sizes_{{ $size }}" name="sizes[{{ $size }}]" type="number" min="0" step="0.01"
                    value="{{ old('sizes.' . $size, $sizes[$size] ?? '') }}" placeholder="0,00">
            </div>
            @endforeach
        </div>
    </div>

    <div class="form-footer">
        <label for="is_available" class="checkbox-label">
            <input id="is_available" name="is_available" type="checkbox" value="1" @checked(old('is_available', $item->is_available ?? true))>
            <span>Disponível no cardápio</span>
        </label>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Salvar</button>
            <a class="btn" href="{{ route('admin.items.index') }}">Cancelar</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        const priceField = document.getElementById('priceField');
        const sizeValuesField = document.getElementById('sizeValuesField');
        const priceInput = document.getElementById('price');
        const sizeValuesGrid = sizeValuesField ? sizeValuesField.querySelector('.grid') : null;

        if (!categorySelect) {
            return;
        }

        const sizeCategories = ['tradicionais', 'especiais', 'nobres', 'sucos_naturais'];
        const pizzaCategories = ['tradicionais', 'especiais', 'nobres'];
        const categorySizeMap = {
            tradicionais: ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'],
            especiais: ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'],
            nobres: ['MÉDIA', 'GRANDE', 'FAMÍLIA', 'BIG'],
            sucos_naturais: ['COPO', 'JARRA']
        };

        const buildSizeInputId = (sizeLabel) => {
            return `sizes_${sizeLabel}`
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-zA-Z0-9]+/g, '_');
        };

        const renderSizeInputs = () => {
            if (!sizeValuesGrid) {
                return;
            }

            const sizes = categorySizeMap[categorySelect.value] || [];
            const currentValues = {};

            sizeValuesGrid.querySelectorAll('input[name^="sizes["]').forEach((input) => {
                currentValues[input.name] = input.value;
            });

            sizeValuesGrid.innerHTML = '';

            sizes.forEach((size) => {
                const field = document.createElement('div');
                field.className = 'field';
                field.style.margin = '0';

                const label = document.createElement('label');
                label.htmlFor = buildSizeInputId(size);
                label.textContent = size;

                const input = document.createElement('input');
                input.id = buildSizeInputId(size);
                input.name = `sizes[${size}]`;
                input.type = 'number';
                input.min = '0';
                input.step = '0.01';
                input.placeholder = '0,00';

                const persistedValue = currentValues[input.name];
                if (typeof persistedValue !== 'undefined') {
                    input.value = persistedValue;
                }

                field.appendChild(label);
                field.appendChild(input);
                sizeValuesGrid.appendChild(field);
            });

            const sizeValuesLabel = sizeValuesField.querySelector('label');
            if (sizeValuesLabel) {
                sizeValuesLabel.textContent = pizzaCategories.includes(categorySelect.value) ?
                    'Tamanhos e valores da pizza' :
                    'Opções e valores do suco natural';
            }
        };

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

            if (requiresSizeValues) {
                renderSizeInputs();
            }
        };

        categorySelect.addEventListener('change', toggleFields);
        toggleFields();
    });
</script>
@endpush