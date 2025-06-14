<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionCompetencia extends Model
{
    use HasFactory;

    protected $table = 'dimension_competencia';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_competencia');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
