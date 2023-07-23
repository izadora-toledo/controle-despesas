<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrarUsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrarNovoUsuario()
    {
        $dadosUsuario = [
            'name' => 'Maria',
            'email' => 'maria@example.com',
            'password' => '12345678',
        ];

        $response = $this->post('/api/register', $dadosUsuario);

        dd($response->json());

        $response->assertStatus(200);
        $response->assertJsonStructure(['data' => ['id', 'name', 'email', 'created_at', 'updated_at']]);

        $this->assertDatabaseHas('users', [
            'name' => 'Maria',
            'email' => 'maria@example.com',
        ]);
    }
}
