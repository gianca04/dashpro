<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dimension_estudiante', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_estudiante')->unique();
            $table->string('nombre_apellido');
            $table->string('sexo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dimension_estudiante');
    }
};
