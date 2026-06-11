<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // Ajustado a las columnas reales de nuestra base de datos
    protected $fillable = [
        'liga_id', 
        'nombre', 
        'entrenador', 
        'puntos', 
        'estado_activo'
    ];

    // --- Relaciones ---
    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }
    
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }
    
    public function partidosLocales()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    public function partidosVisitantes()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }

    // --- Calcular puntos totales de forma dinámica ---
    public function getPuntosAttribute()
    {
        $puntos = 0;

        // Sumar puntos como local
        foreach ($this->partidosLocales as $partido) {
            if ($partido->resultado_local !== null && $partido->resultado_visitante !== null) {
                if ($partido->resultado_local > $partido->resultado_visitante) $puntos += 3;
                elseif ($partido->resultado_local == $partido->resultado_visitante) $puntos += 1;
            }
        }

        // Sumar puntos como visitante
        foreach ($this->partidosVisitantes as $partido) {
            if ($partido->resultado_local !== null && $partido->resultado_visitante !== null) {
                if ($partido->resultado_visitante > $partido->resultado_local) $puntos += 3;
                elseif ($partido->resultado_visitante == $partido->resultado_local) $puntos += 1;
            }
        }

        return $puntos;
    }
}