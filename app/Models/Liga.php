<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'deporte', 'temporada', 'descripcion'];

    // Una Liga tiene muchos Equipos (Relación 1 a Muchos)
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
    
    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }
}