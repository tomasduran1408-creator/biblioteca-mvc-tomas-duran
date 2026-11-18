
@extends('layouts.app')

@section('titulo', 'Categorías - Biblioteca de Tomas Duran')

@section('contenido')
    <h2>Categorías de libros</h2>

    <p>Organiza tus libros por categorías.</p>

    <a class="boton" href="{{ route('categorias.create') }}">
        Crear categoría
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion ?? 'Sin descripción' }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria) }}">
                            Ver
                        </a> |

                        <a href="{{ route('categorias.edit', $categoria) }}">
                            Editar
                        </a>

                        <form action="{{ route('categorias.destroy', $categoria) }}"
                              method="POST"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay categorías registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
