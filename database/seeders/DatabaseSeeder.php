<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Matricula;

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
    	Grupo::truncate();
    	Matricula::truncate();
        Curso::truncate();
        Grupo::factory(20)->create();
        Matricula::factory(15)->create();
        Curso::factory(10)->create();




        $user= new User;
        $user->name ="Carlos";
        $user->email="4779458@alu.murciaeduca.es";
        $user->password=bcrypt("password");
        $user->usuario_av=128891;
        $user->save();
    }

}
