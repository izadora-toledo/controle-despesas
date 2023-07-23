<?php

namespace Database\Factories;

use App\Models\Despesa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class DespesaFactory extends Factory
{
    protected $model = Despesa::class;

    public function definition()
    {
        return [
            'descricao' => $this->faker->sentence(3),
            'data' => $this->faker->date(),
            'id_usuario' => 0,
            'valor' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
