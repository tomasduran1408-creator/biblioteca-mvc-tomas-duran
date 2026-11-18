
@extends('layouts.app')

@section('titulo', 'Libros - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Listado de libros</h2>
<form action="{{ route('libros.index') }}" method="GET">

    <label for="buscar">Buscar por título o autor:</label>
    <input
        type="text"
        id="buscar"
        name="buscar"
        placeholder="Buscar por título o autor..."
        value="{{ $busqueda ?? '' }}"
    >

    <label for="categoria">Filtrar por categoría:</label>
    <select name="categoria" id="categoria">
        <option value="">Todas las categorías</option>

        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ ($categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <button type="submit">Buscar</button>
    <a class="boton" href="{{ route('libros.index') }}">Limpiar</a>

</form>
    <a class="boton" href="{{ route('libros.create') }}">
        Registrar nuevo libro
    </a>

    @if($libros->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->categoria->nombre }}</td>
                        <td>{{ $libro->estado }}</td>
                        <td>
                            <a href="{{ route('libros.show', $libro) }}">Ver</a> |
                            <a href="{{ route('libros.edit', $libro) }}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay libros registrados todavía.</p>
    @endif
@endsection
