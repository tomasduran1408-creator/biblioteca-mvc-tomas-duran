
@extends('layouts.app')

@section('titulo', 'Inicio - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Bienvenido a mi biblioteca virtual</h2>

    <p>Administra tus libros y categorías desde esta aplicación.</p>

    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
        <a class="boton" href="{{ route('libros.index') }}">
            Administrar libros
        </a>

        <a class="boton" href="{{ route('categorias.index') }}">
            Administrar categorías
        </a>
    </div>
@endsection

