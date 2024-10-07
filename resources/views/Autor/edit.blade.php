@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Autor</h1>
        <form action="{{ route('autors.update', $autor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="text" name="nome" value="{{ $autor->nome }}" class="form-control" placeholder="Nome" required>
            </div>
            <div class="mb-3">
                <input type="text" name="biografia" value="{{ $autor->biografia }}" class="form-control" placeholder="Biografia" required>
            </div>
            <div class="mb-3">
                <input type="text" name="data_nasc" value="{{ $autor->data_nasc }}" class="form-control" placeholder="Data de Nascimento" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto Atual:</label>
                @if ($autor->foto)
                    <div>
                        <img src="{{ asset('storage/' . $autor->foto) }}" alt="Foto do Autor" style="max-width: 150px; max-height: 150px;">
                    </div>
                @else
                    <p>Nenhuma foto atual.</p>
                @endif

                <label for="foto">Mudar Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection