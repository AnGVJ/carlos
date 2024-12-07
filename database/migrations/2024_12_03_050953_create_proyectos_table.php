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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('id');
            $table->string('Codigo', 55)->nullable();
            $table->string('Nombreproyecto', 500);
            $table->date('Fechainicio')->nullable();
            $table->date('Fechafinal')->nullable();
            $table->integer('Avance')->default(0)->nullable();
            $table->string('Municipiodelaobra', 205)->nullable();
            $table->string('Localidad', 500)->nullable();
            $table->string('NoOficio', 105)->nullable();
            $table->integer('Montototal')->nullable();
            $table->integer('Abono')->default(0)->nullable();
            $table->string('Estado', 105)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
