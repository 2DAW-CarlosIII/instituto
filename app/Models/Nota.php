<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materia_id',
        'evaluacion',
        'nota'
    ];

    /*Devuelve el usuario de esa nota*/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*Devuelve la materia de esa nota*/
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

}
