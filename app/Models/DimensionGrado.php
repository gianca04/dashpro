<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionGrado extends Model
{
    use HasFactory;

    protected $table = 'dimension_grado';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_grado');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
