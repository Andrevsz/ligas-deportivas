<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = [
        'liga_id', // Agregamos este
        'equipo_local_id',
        'equipo_visitante_id',
        'resultado_local',
        'resultado_visitante',
        'fecha_hora' // Corregimos este nombre
    ];

    // Un Partido pertenece a una Liga
    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }

    // Un Partido pertenece a un Equipo Local
    public function equipoLocal()
    {
        // Especificamos 'equipo_local_id' como la columna de conexión
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    // Un Partido pertenece a un Equipo Visitante
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }
}