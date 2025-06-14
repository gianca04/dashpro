<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionEstudiante extends Model
{
    use HasFactory;

    protected $table = 'dimension_estudiante';

    protected $fillable = [
        'codigo_estudiante',
        'nombre_apellido',
        'sexo',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_estudiante');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
