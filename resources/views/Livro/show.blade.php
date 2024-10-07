@extends('layouts.app')

@section('content')
    <div class="container">

        @if($livro->foto)
            <img src="{{ asset('storage/' . $livro->foto) }}" alt="{{ $livro->titulo }}" class="img-thumbnail" style="width: 200px; height: 200px;">
        @else
            <img src="https://via.placeholder.com/50" alt="Sem imagem" class="img-thumbnail">
        @endif

        <h1>{{ $livro->titulo }}</h1>
        <p><strong>Sinopse:</strong> {{ $livro->descicao }}</p>
        <p><strong>Data de Publicação:</strong> {{ $livro->data_pub }}</p>
        <p><strong>Categoria:</strong> {{ $livro->categoria->nome }}</p>
        <p><strong>Autor:</strong> {{ $livro->autorlivro->nome }}</p>
        <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection