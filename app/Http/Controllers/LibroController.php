<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Resources\LibroResource;

class LibroController extends Controller
{
    // GET /api/books
    public function index(Request $request)
    {
        $query = Libro::query();

        
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }
        if ($request->filled('isbn')) {
            $query->where('isbn', $request->isbn);
        }
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        $libros = $query->get();

        // Usar API Resource para mapear
        return LibroResource::collection($libros);
    }
}
