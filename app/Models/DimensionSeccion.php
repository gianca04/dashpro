<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionSeccion extends Model
{
    use HasFactory;

    protected $table = 'dimension_seccion';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_seccion');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
