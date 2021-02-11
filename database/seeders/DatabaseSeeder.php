<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Matricula;
use App\Models\Materia;

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
        Materia::truncate();
        User::factory(10)->create();
        Grupo::factory(20)->create();
        Matricula::factory(15)->create();
        Materia::factory(5)->create();

        $this->call([

            NotasTableSeeder::class,

        ]);

        $user = User::factory()
            ->has(Grupo::factory()->count(3))
            ->create();
    }

}
