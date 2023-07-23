<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Despesa;
use App\Models\User;

class DespesaSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1);
        if (!$user) {
            $this->command->info('Usuário com ID 1 não encontrado. Execute o UserSeeder primeiro.');
            return;
        }

        Despesa::factory()->count(3)->create([
            'id_usuario' => $user->id,
        ]);
    }
}
