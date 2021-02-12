<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::factory();
    	Grupo::truncate();
    	Matricula::truncate();
        Grupo::factory(20)->create();
        Matricula::factory(15)->create();

        User::factory()
        ->has(Grupo::factory()->count(3))
        ->create();

        self::seedUser();

        self::seedCurso();
    }

    public static function seedUser(){
        $user = new User();
        $user->name = 'Pablo Méndez';
        $user->email = '1793960@alu.murciaeduca.es';
        $user->password = Hash::make('password');
        $user->usuario_av = '20574';
        $user->save();
    }

    public static function seedCurso(){
        $curso = new Curso();
        $curso->shortname = 'algo';
        $curso->fullname = 'algo más';
        $curso->save();
    }
}
