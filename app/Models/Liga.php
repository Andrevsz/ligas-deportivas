<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'deporte',
        'temporada',
        'descripcion',
        'estado_activa',
    ];

    // Una liga pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Una liga tiene muchos equipos
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}