<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensionPeriodo extends Model
{
    use HasFactory;

    protected $table = 'dimension_periodo';

    protected $fillable = [
        'nombre',
    ];

    public function hechos()
    {
        return $this->hasMany(Hecho::class, 'id_dimension_periodo');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
        ];
    }
}
