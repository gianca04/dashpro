<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hechos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dimension_nivel')->constrained('dimension_nivel');
            $table->foreignId('id_dimension_grado')->constrained('dimension_grado');
            $table->foreignId('id_dimension_seccion')->constrained('dimension_seccion');
            $table->foreignId('id_dimension_periodo')->constrained('dimension_periodo');
            $table->foreignId('id_dimension_curso')->constrained('dimension_curso');
            $table->foreignId('id_dimension_competencia')->constrained('dimension_competencia');
            $table->foreignId('id_dimension_estudiante')->constrained('dimension_estudiante');
            $table->float('valor_metrica');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hechos');
    }
};
