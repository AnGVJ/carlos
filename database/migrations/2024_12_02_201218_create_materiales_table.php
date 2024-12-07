<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();      // Código del material
            $table->string('concepto')->nullable();    // Concepto
            $table->string('unidad')->nullable();      // Unidad
            $table->date('fecha')->nullable();         // Fecha
            $table->decimal('cantidad', 10, 2)->nullable(); // Cantidad
            $table->string('obra')->nullable();        // Nombre de la obra
            $table->string('estado')->nullable();      // Estado (completo, incompleto, pendiente)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
