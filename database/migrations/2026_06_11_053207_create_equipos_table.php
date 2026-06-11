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
    Schema::create('equipos', function (Blueprint $table) {
        $table->id();
        
        // Esta es la conexión mágica. Vincula el equipo a una liga específica.
        // onDelete('cascade') significa que si borras la liga, se borran sus equipos.
        $table->foreignId('liga_id')->constrained('ligas')->onDelete('cascade');
        $table->string('nombre'); // Ej: Los Leones FC
        $table->string('entrenador')->nullable(); // Nombre del DT (Opcional)
        $table->integer('puntos')->default(0); // Empezamos en 0 para la tabla de posiciones
        $table->boolean('estado_activo')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
