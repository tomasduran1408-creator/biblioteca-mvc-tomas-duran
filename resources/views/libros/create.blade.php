
@extends('layouts.app')

@section('titulo', 'Registrar libro - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Registrar nuevo libro</h2>

    <p>Completa los datos para agregar un libro al catálogo.</p>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo"
               value="{{ old('titulo') }}" required>
        @error('titulo')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor"
               value="{{ old('autor') }}" required>
        @error('autor')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn"
               value="{{ old('isbn') }}">
        @error('isbn')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="anio">Año de publicación:</label>
        <input type="number" id="anio" name="anio"
               value="{{ old('anio') }}">
        @error('anio')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio"
               value="{{ old('precio') }}">
        @error('precio')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="Disponible" {{ old('estado', 'Disponible') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="Prestado" {{ old('estado') == 'Prestado' ? 'selected' : '' }}>Prestado</option>
            <option value="Reservado" {{ old('estado') == 'Reservado' ? 'selected' : '' }}>Reservado</option>
        </select>
        @error('estado')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id" required>
            <option value="">Seleccione una categoría</option>

            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Guardar libro</button>
        <a class="boton" href="{{ route('libros.index') }}">Volver al catálogo</a>
    </form>
@endsection
