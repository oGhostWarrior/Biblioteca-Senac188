@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Livros</h1>
        <a href="{{ route('livros.create') }}" class="btn btn-success mb-3">Novo Livro</a>

        <!-- Barra de Busca -->
        <form method="GET" action="{{ route('livros.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Busca por titulo" value="{{ request()->input('search') }}">
        </form>



        <ul class="list-group">
            @foreach ($livros as $livro)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $livro->titulo }} - {{ $livro->categoria->nome }}</span>
                    <div>
                        <a href="{{ route('livros.show', $livro) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <!-- Paginação -->
        <div class="mt-3">
            {{ $livros->links() }}
        </div>
    </div>
@endsection