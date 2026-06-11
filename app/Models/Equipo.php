<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // Campos que permitimos guardar desde el formulario
    protected $fillable = ['liga_id', 'nombre', 'ciudad', 'logo_url'];

    // Un Equipo pertenece a una Liga (Relación Inversa)
    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }
    
    public function jugadores()
    {
        return $this->hasMany(Jugador::class);
    }
    
    // Un Equipo juega muchos partidos como LOCAL
    public function partidosLocales()
    {
        return $this->hasMany(Partido::class, 'equipo_local_id');
    }

    // Un Equipo juega muchos partidos como VISITANTE
    public function partidosVisitantes()
    {
        return $this->hasMany(Partido::class, 'equipo_visitante_id');
    }
}
