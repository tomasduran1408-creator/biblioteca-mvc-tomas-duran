
@extends('layouts.app')

@section('titulo', 'Crear categoría - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Registrar nueva categoría</h2>

    <p>Completa los datos para agregar una categoría a tu biblioteca.</p>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" id="nombre" name="nombre"
               value="{{ old('nombre') }}" required>

        @error('nombre')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"
                  rows="4">{{ old('descripcion') }}</textarea>

        @error('descripcion')
            <p style="color: #b42318;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Guardar categoría</button>

        <a class="boton" href="{{ route('categorias.index') }}">
            Volver a categorías
        </a>
    </form>
@endsection
