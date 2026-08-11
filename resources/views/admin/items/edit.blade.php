@extends('admin.layout')

@section('title', 'Editar Item')

@section('content')
    <div class="card">
        <h1>Editar item</h1>
        <p class="muted">Atualize os dados do item selecionado.</p>

        <form action="{{ route('admin.items.update', $item) }}" method="POST">
            @method('PUT')
            @include('admin.items._form')
        </form>
    </div>
@endsection
