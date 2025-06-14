<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hecho extends Model
{
    use HasFactory;

    protected $table = 'hechos';

    protected $fillable = [
        'id_dimension_nivel',
        'id_dimension_grado',
        'id_dimension_seccion',
        'id_dimension_periodo',
        'id_dimension_curso',
        'id_dimension_competencia',
        'id_dimension_estudiante',
        'valor_metrica',
    ];

    public function dimensionNivel()
    {
        return $this->belongsTo(DimensionNivel::class, 'id_dimension_nivel');
    }

    public function dimensionGrado()
    {
        return $this->belongsTo(DimensionGrado::class, 'id_dimension_grado');
    }

    public function dimensionSeccion()
    {
        return $this->belongsTo(DimensionSeccion::class, 'id_dimension_seccion');
    }

    public function dimensionPeriodo()
    {
        return $this->belongsTo(DimensionPeriodo::class, 'id_dimension_periodo');
    }

    public function dimensionCurso()
    {
        return $this->belongsTo(DimensionCurso::class, 'id_dimension_curso');
    }

    public function dimensionCompetencia()
    {
        return $this->belongsTo(DimensionCompetencia::class, 'id_dimension_competencia');
    }

    public function dimensionEstudiante()
    {
        return $this->belongsTo(DimensionEstudiante::class, 'id_dimension_estudiante');
    }

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'id_dimension_nivel' => 'integer',
            'id_dimension_grado' => 'integer',
            'id_dimension_seccion' => 'integer',
            'id_dimension_periodo' => 'integer',
            'id_dimension_curso' => 'integer',
            'id_dimension_competencia' => 'integer',
            'id_dimension_estudiante' => 'integer',
            'valor_metrica' => 'float',
        ];
    }
}
