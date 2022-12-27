<?php

namespace Database\Factories;

use App\Models\Receita;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
