<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
   public function index(Request $request)
{
    $busqueda = $request->input('buscar');
    $categoria_id = $request->input('categoria');

    $libros = Libro::with('categoria')
        ->when($busqueda, function ($query, $busqueda) {
            $query->where(function ($q) use ($busqueda) {
                $q->where('titulo', 'like', "%{$busqueda}%")
                  ->orWhere('autor', 'like', "%{$busqueda}%");
            });
        })
        ->when($categoria_id, function ($query, $categoria_id) {
            $query->where('categoria_id', $categoria_id);
        })
        ->get();

    $categorias = Categoria::all();

    return view('libros.index', compact(
        'libros',
        'busqueda',
        'categorias',
        'categoria_id'
    ));
}

    public function create()
    {
        $categorias = Categoria::all();

        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:150',
            'isbn' => 'nullable|string|max:20|unique:libros,isbn',
            'anio' => 'nullable|integer|min:1000|max:9999',
            'precio' => 'nullable|numeric|min:0',
            'estado' => 'required|string|max:30',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Libro::create($datos);

        return redirect()->route('libros.index')
            ->with('success', 'Libro registrado correctamente.');
    }

    public function show(Libro $libro)
    {
        $libro->load('categoria');

        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::all();

        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string|max:150',
            'isbn' => 'nullable|string|max:20|unique:libros,isbn,' . $libro->id,
            'anio' => 'nullable|integer|min:1000|max:9999',
            'precio' => 'nullable|numeric|min:0',
            'estado' => 'required|string|max:30',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $libro->update($datos);

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}
