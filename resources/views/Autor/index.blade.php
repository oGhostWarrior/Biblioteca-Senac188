@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Autores</h1>
        <a href="{{ route('autors.create') }}" class="btn btn-success mb-3">Novo Autor</a>
        
        <!-- Barra de Busca -->
        <form method="GET" action="{{ route('autors.index') }}" class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome" value="{{ request()->input('search') }}">
        </form>
        
        <!-- Grid de Autores -->
        <div class="row">
            @foreach ($autors as $autor)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($autor->foto)
                            <img src="{{ asset('storage/' . $autor->foto) }}" class="card-img-top" alt="{{ $autor->nome }}">
                        @else
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $autor->nome }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $autor->nome }}</h5>
                            <p class="card-text">{{ Str::limit($autor->biografia, 100) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('autors.show', $autor) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('autors.edit', $autor) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('autors.destroy', $autor) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $autors->links() }}
        </div>
    </div>
@endsection