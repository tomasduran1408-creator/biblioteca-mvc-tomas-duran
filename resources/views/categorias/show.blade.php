
@extends('layouts.app')

@section('titulo', 'Detalles de categoría - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Detalles de la categoría</h2>

    <p>Información de la categoría seleccionada.</p>

    <div style="background: #f5f8f2; padding: 22px; border-radius: 10px; border: 1px solid #dce6d8;">

        <p><strong>ID:</strong> {{ $categoria->id }}</p>

        <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>

        <p><strong>Descripción:</strong>
            {{ $categoria->descripcion ?? 'Sin descripción' }}
        </p>

    </div>

    <br>

    <a class="boton" href="{{ route('categorias.edit', $categoria) }}">
        Editar categoría
    </a>

    <a class="boton" href="{{ route('categorias.index') }}">
        Volver a categorías
    </a>
@endsection
