@extends('admin.layout')

@section('title', 'Itens do Cardapio')

@section('content')
    <div class="card" style="margin-bottom:16px;display:flex;justify-content:space-between;align-items:center;gap:12px;">
        <div>
            <h1 style="margin:0;">Itens do cardapio</h1>
            <p class="muted" style="margin:6px 0 0;">Adicione, edite ou remova itens que aparecem no site.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.items.create') }}">Novo item</a>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preco</th>
                    <th>Ordem</th>
                    <th>Status</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            <strong>{{ $item->name }}</strong>
                            @if ($item->description)
                                <div class="muted">{{ $item->description }}</div>
                            @endif
                        </td>
                        <td>{{ $categories[$item->category] ?? ucfirst($item->category) }}</td>
                        <td>R$ {{ number_format((float) $item->price, 2, ',', '.') }}</td>
                        <td>{{ $item->display_order }}</td>
                        <td>{{ $item->is_available ? 'Disponivel' : 'Oculto' }}</td>
                        <td>
                            <div class="row-actions">
                                <a class="btn" href="{{ route('admin.items.edit', $item) }}">Editar</a>
                                <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Deseja realmente excluir este item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="muted">Nenhum item cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:14px;">{{ $items->links() }}</div>
    </div>
@endsection
