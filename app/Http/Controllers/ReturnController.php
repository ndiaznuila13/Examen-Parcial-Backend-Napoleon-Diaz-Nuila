<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Libro;

class ReturnController extends Controller
{
    public function store($loan_id)
    {
        $loan = Loan::find($loan_id);
        if (!$loan) {
            return response()->json(['error' => 'Préstamo no encontrado'], 422);
        }
        if ($loan->fecha_devolucion) {
            return response()->json(['error' => 'El libro ya fue devuelto'], 422);
        }

        $libro = $loan->libro;
        $loan->fecha_devolucion = now();
        $loan->save();

        $libro->copias_disponibles += 1;
        if ($libro->copias_disponibles > 0) {
            $libro->estado = true;
        }
        $libro->save();

        return response()->json([
            'message' => 'Libro devuelto correctamente',
            'libro' => $libro,
            'fecha_devolucion' => $loan->fecha_devolucion,
        ], 200);
    }
}
