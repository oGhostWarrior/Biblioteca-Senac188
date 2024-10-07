@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Autor</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('autors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}">
            </div>
            <div class="mb-3">
                <input type="text" name="biografia" class="form-control" placeholder="Biografia" value="{{ old('biografia') }}">
            </div>
            <div class="mb-3">
                <input type="text" name="data_nasc" class="form-control" placeholder="Data de Nascimento" value="{{ old('data_nasc') }}">
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection