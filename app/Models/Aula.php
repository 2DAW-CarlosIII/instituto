<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'numero',
        'edificio',
        'planta',
        'centro_id'
    ];
}
