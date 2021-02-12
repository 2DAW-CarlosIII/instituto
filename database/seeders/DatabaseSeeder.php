<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Curso;
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
        self::añadirUsuarioAV();
        User::factory(10)->create();
        Grupo::factory(20)->create();
        Matricula::factory(15)->create();
        Curso::factory(10)->create();

        $user = User::factory()
            ->has(Grupo::factory()->count(3))
            ->create();
    }

    private static function añadirUsuarioAV(){
        $u = new User;
        $u->name='Jose Ramon';
        $u->email = '2280256@alu.murciaeduca.es';
        $u->password = bcrypt('password');
        $u->usuario_av ='85135';
        $u-save();
    }

}
