<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->get();

        return view('libros.index', compact('libros'));
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
