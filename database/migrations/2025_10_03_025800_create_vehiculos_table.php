<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('descripcion');
            $table->year('anio');
            $table->string('color');
            $table->decimal('precio', 10, 2);
            $table->string('transmision');
            $table->string('combustible');
            $table->decimal('kilometraje', 10, 2);
            $table->string('imagen')->nullable();
            $table->string('estado'); // Nuevo o Usado
            $table->string('tipo'); // Sedan, SUV, Camioneta, etc.
            $table->string('descripcion_larga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
