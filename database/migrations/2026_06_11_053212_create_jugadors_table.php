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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            // Llave foránea: Conecta el jugador a un equipo.
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->string('nombre_completo');
            $table->string('posicion');
            $table->integer('dorsal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
