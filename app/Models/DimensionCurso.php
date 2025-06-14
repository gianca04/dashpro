<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionCurso extends Model
{
    use HasFactory;

    protected $table = 'dimension_curso';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_curso');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
