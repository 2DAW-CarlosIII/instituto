<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Curso extends Model
{
    use HasFactory;

    protected $fillable=[
        'shortname',
        'fullname',
        'summary',
        'showgrades',
        'startdate'
    ];

    
}
