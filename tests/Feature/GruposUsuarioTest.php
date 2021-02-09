<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Grupo;
use Laravel\Sanctum\Sanctum;

class GruposUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_UserGrupos()
    {
        // Sin autenticar, devuelve una redirección (302) al login.
        $response = $this->get('/api/grupos');
        $response->assertStatus(302);

        // Autenticado, devuelve un 200.
        Sanctum::actingAs(
            User::factory()
            ->hasAttached(
                Grupo::factory()->count(3)
            )
            ->create()
        );
        $response = $this->get('/api/grupos');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure(['data' => [['curso', 'nivel', 'letra']]]);
    }
}
