@extends('layouts.app')

@section('content')

    <div class="container">

        @if($autor->foto)
            <img src="{{ asset('storage/' . $autor->foto) }}" alt="{{ $autor->nome }}" class="img-thumbnail" style="width: 100px; height: 100px;">
        @else
            <img src="https://via.placeholder.com/50" alt="Sem imagem" class="img-thumbnail">
        @endif

        <h1>{{ $autor->nome }}</h1>
        <p><strong>Biografia:</strong> {{ $autor->biografia }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $autor->data_nasc }}</p>
        <a href="{{ route('autors.index') }}" class="btn btn-primary">Voltar</a>
    </div>
    
@endsection