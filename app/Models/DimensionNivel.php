<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionNivel extends Model
{
    use HasFactory;

    protected $table = 'dimension_nivel';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_nivel');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
