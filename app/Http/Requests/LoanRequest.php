<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libro_id' => 'required|exists:libros,id',
            'nombre_solicitante' => 'required|string',
        ];
    }
}
