<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable=[
        'curso',
        'letra',
        'nombre',
        'tutor',
        'anyoescolar',
        'nivel',
        'verificado',
        'creador'
    ];

    /**
     * Devuelve el coordinador del centro.
     */
    public function nivelEstudios()
    {
        return $this->belongsTo(Nivel::class, 'nivel');
    }

    /**
     * Los usuarios matriculados un determinado grupo.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'matriculas', 'grupo', 'alumno');
    }
}
