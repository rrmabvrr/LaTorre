@extends('admin.layout')

@section('title', 'Itens do Cardápio')

@section('content')
    <div class="card page-head">
        <div>
            <h1 style="margin:0;">Itens do cardápio</h1>
            <p class="muted" style="margin:6px 0 0;">Adicione, edite ou remova itens que aparecem no site.</p>
        </div>
        <a class="btn btn-success" href="{{ route('admin.items.create') }}">Novo item</a>
    </div>

    <div class="card mobile-only" style="margin-bottom: 12px;">
        <div class="mobile-list">
            @forelse ($items as $item)
                <article class="item-card">
                    <div class="item-card-head">
                        <h2 class="item-card-title texto-curto">{{ $item->name }}</h2>
                        @if (!empty($item->sizes) && is_array($item->sizes))
                            <strong>{{ count($item->sizes) }} tamanhos</strong>
                        @else
                            <strong>R$ {{ number_format((float) $item->price, 2, ',', '.') }}</strong>
                        @endif
                    </div>

                    @if ($item->description)
                        <p class="muted texto-curto" style="margin: 0 0 8px;">{{ $item->description }}</p>
                    @endif

                    @if (!empty($item->sizes) && is_array($item->sizes))
                        <p class="muted texto-curto" style="margin: 0 0 8px;">
                            @foreach ($item->sizes as $sizeName => $sizeValue)
                                {{ $sizeName }}: R$ {{ number_format((float) $sizeValue, 2, ',', '.') }}@if (! $loop->last), @endif
                            @endforeach
                        </p>
                    @endif

                    <p class="item-meta">
                        <span><strong>Categoria:</strong> {{ $categories[$item->category] ?? ucfirst($item->category) }}</span>
                        <span><strong>Ordem:</strong> {{ $item->display_order }}</span>
                        <span><strong>Status:</strong> {{ $item->is_available ? 'Disponível' : 'Oculto' }}</span>
                    </p>

                    <div class="row-actions" style="margin-top: 10px;">
                        <a class="btn" href="{{ route('admin.items.edit', $item) }}">Editar</a>
                        <form action="{{ route('admin.items.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir este item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </article>
            @empty
                <article class="item-card">
                    <p class="muted">Nenhum item cadastrado ainda.</p>
                </article>
            @endforelse
        </div>
    </div>

    <div class="card table-wrap desktop-only">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Ordem</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            <strong class="texto-curto">{{ $item->name }}</strong>
                            @if ($item->description)
                                <div class="muted texto-curto">{{ $item->description }}</div>
                            @endif
                            @if (!empty($item->sizes) && is_array($item->sizes))
                                <div class="muted texto-curto">
                                    @foreach ($item->sizes as $sizeName => $sizeValue)
                                        {{ $sizeName }}: R$ {{ number_format((float) $sizeValue, 2, ',', '.') }}@if (! $loop->last) | @endif
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td>{{ $categories[$item->category] ?? ucfirst($item->category) }}</td>
                        <td>
                            @if (!empty($item->sizes) && is_array($item->sizes))
                                {{ count($item->sizes) }} tamanhos
                            @else
                                R$ {{ number_format((float) $item->price, 2, ',', '.') }}
                            @endif
                        </td>
                        <td>{{ $item->display_order }}</td>
                        <td>{{ $item->is_available ? 'Disponível' : 'Oculto' }}</td>
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
    </div>

    @if ($items->hasPages())
        @php
            $startPage = max(1, $items->currentPage() - 2);
            $endPage = min($items->lastPage(), $items->currentPage() + 2);
        @endphp
        <div class="pagination-wrap">
            <div class="pagination-mobile mobile-only">
                @if ($items->onFirstPage())
                    <span class="btn disabled">Anterior</span>
                @else
                    <a class="btn" href="{{ $items->previousPageUrl() }}">Anterior</a>
                @endif

                <span class="pagination-status">{{ $items->currentPage() }}/{{ $items->lastPage() }}</span>

                @if ($items->hasMorePages())
                    <a class="btn btn-primary" href="{{ $items->nextPageUrl() }}">Próxima</a>
                @else
                    <span class="btn btn-primary disabled">Próxima</span>
                @endif
            </div>

            <div class="pagination-desktop desktop-only">
                @if ($items->onFirstPage())
                    <span class="page-link disabled">Anterior</span>
                @else
                    <a class="page-link" href="{{ $items->previousPageUrl() }}">Anterior</a>
                @endif

                @for ($page = $startPage; $page <= $endPage; $page++)
                    @if ($page === $items->currentPage())
                        <span class="page-link active">{{ $page }}</span>
                    @else
                        <a class="page-link" href="{{ $items->url($page) }}">{{ $page }}</a>
                    @endif
                @endfor

                @if ($items->hasMorePages())
                    <a class="page-link" href="{{ $items->nextPageUrl() }}">Próxima</a>
                @else
                    <span class="page-link disabled">Próxima</span>
                @endif
            </div>
        </div>
    @endif
@endsection
