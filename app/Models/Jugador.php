<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    // Aquí le decimos a Laravel el nombre exacto de la tabla en español
    protected $table = 'jugadores';

    protected $fillable = ['equipo_id', 'nombre_completo', 'posicion', 'dorsal'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}