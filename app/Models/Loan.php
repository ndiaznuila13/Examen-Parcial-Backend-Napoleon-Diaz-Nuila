<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_solicitante',
        'fecha_hora',
        'fecha_devolucion',
        'libro_id',
    ];

    public $timestamps = false;

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
