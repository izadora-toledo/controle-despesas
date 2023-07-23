<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Despesa;
use App\Models\User;

class DespesaTest extends TestCase
{
    public function testCriarDespesa()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $dadosDespesa = [
            'data' => '2023-07-23',
            'valor' => 100.00,
            'descricao' => 'baba',
        ];

        $response = $this->post('/api/despesas', $dadosDespesa);

        $response->assertStatus(201);

        $this->assertInstanceOf(Despesa::class, $response->original);
        $this->assertDatabaseHas('despesas', $dadosDespesa);
        $this->assertEquals($user->id, $response->original->id_usuario);
    }
}
