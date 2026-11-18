
@extends('layouts.app')

@section('titulo', 'Editar categoría - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Editar categoría</h2>

    <p>Modifica la información de la categoría seleccionada.</p>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre de la categoría:</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $categoria->nombre) }}"
            required
        >

        @error('nombre')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="descripcion">Descripción:</label>

        <textarea
            id="descripcion"
            name="descripcion"
            rows="4"
        >{{ old('descripcion', $categoria->descripcion) }}</textarea>

        @error('descripcion')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Actualizar categoría</button>

        <a class="boton" href="{{ route('categorias.index') }}">
            Volver a categorías
        </a>
    </form>
@endsection
