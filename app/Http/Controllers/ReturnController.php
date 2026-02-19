<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Libro;

class ReturnController extends Controller
{
    public function store($loan_id)
    {
        $libro = Libro::find($loan_id);
        if (!$libro) {
            return response()->json(['error' => 'Libro no encontrado'], 422);
        }
        $libro->copias_disponibles += 1;
        if ($libro->copias_disponibles > 0) {
            $libro->estado = true;
        }
        $libro->save();

        return response()->json([
            'message' => 'Libro devuelto correctamente',
            'libro' => $libro,
        ], 200);
    }
}
