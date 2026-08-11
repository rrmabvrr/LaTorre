@extends('admin.layout')

@section('title', 'Novo Item')

@section('content')
    <div class="card">
        <h1>Novo item do cardapio</h1>
        <p class="muted">Preencha os dados abaixo para adicionar um novo item.</p>

        <form action="{{ route('admin.items.store') }}" method="POST">
            @include('admin.items._form')
        </form>
    </div>
@endsection
