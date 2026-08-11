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

    <div class="field">
        <label for="price">Preço (R$)</label>
        <input id="price" name="price" type="number" value="{{ old('price', $item->price) }}" min="0" step="0.01" required>
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
