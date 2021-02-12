<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortname',
        'fullname',
        'summary',
        'showgrades',
        'startdate',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'curso_user', 'user_id', 'curso_id');
    }
}
