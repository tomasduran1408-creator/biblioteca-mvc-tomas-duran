
@extends('layouts.app')

@section('titulo', 'Editar libro - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Editar libro</h2>

    <p>Modifica la información del libro seleccionado.</p>

    <form action="{{ route('libros.update', $libro) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo"
               value="{{ old('titulo', $libro->titulo) }}" required>
        @error('titulo')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor"
               value="{{ old('autor', $libro->autor) }}" required>
        @error('autor')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn"
               value="{{ old('isbn', $libro->isbn) }}">
        @error('isbn')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="anio">Año de publicación:</label>
        <input type="number" id="anio" name="anio"
               value="{{ old('anio', $libro->anio) }}">
        @error('anio')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio"
               value="{{ old('precio', $libro->precio) }}">
        @error('precio')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            @foreach(['Disponible', 'Prestado', 'Reservado'] as $estado)
                <option value="{{ $estado }}"
                    {{ old('estado', $libro->estado) == $estado ? 'selected' : '' }}>
                    {{ $estado }}
                </option>
            @endforeach
        </select>
        @error('estado')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Actualizar libro</button>

        <a class="boton" href="{{ route('libros.index') }}">
            Volver al catálogo
        </a>
    </form>
@endsection
