
@extends('layouts.app')

@section('titulo', 'Detalles del libro - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Detalles del libro</h2>

    <p>Información completa del libro seleccionado.</p>

    <div style="background: #f5f8f2; padding: 22px; border-radius: 10px; border: 1px solid #dce6d8;">

        <p><strong>ID:</strong> {{ $libro->id }}</p>

        <p><strong>Título:</strong> {{ $libro->titulo }}</p>

        <p><strong>Autor:</strong> {{ $libro->autor }}</p>

        <p><strong>ISBN:</strong> {{ $libro->isbn ?? 'No registrado' }}</p>

        <p><strong>Año de publicación:</strong> {{ $libro->anio ?? 'No registrado' }}</p>

        <p><strong>Precio:</strong>
            {{ $libro->precio !== null ? '$' . number_format($libro->precio, 2, ',', '.') : 'No registrado' }}
        </p>

        <p><strong>Estado:</strong> {{ $libro->estado }}</p>

        <p><strong>Categoría:</strong> {{ $libro->categoria->nombre }}</p>

    </div>

    <br>

    <a class="boton" href="{{ route('libros.edit', $libro) }}">
        Editar libro
    </a>

    <a class="boton" href="{{ route('libros.index') }}">
        Volver al catálogo
    </a>
@endsection
