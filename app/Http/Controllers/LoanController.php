<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Loan;
use App\Http\Requests\LoanRequest;

class LoanController extends Controller
{
    // POST /api/loans
    public function store(LoanRequest $request)
    {
        $libro = Libro::find($request->libro_id);
        if ($libro->copias_disponibles < 1) {
            return response()->json(['error' => 'No hay copias disponibles'], 422);
        }

        $fecha_hora = now();
        $loan = Loan::create([
            'nombre_solicitante' => $request->nombre_solicitante,
            'fecha_hora' => $fecha_hora,
            'libro_id' => $libro->id,
        ]);

        $libro->copias_disponibles -= 1;
        if ($libro->copias_disponibles == 0) {
            $libro->estado = false;
        }
        $libro->save();

        return response()->json([
            'message' => 'Préstamo registrado',
            'libro' => $libro,
            'fecha_hora' => $fecha_hora,
            'loan_id' => $loan->id,
        ], 201);
    }
}
