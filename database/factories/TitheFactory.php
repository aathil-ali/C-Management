<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tithe>
 */
class TitheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit(),
            'date' => $this->faker->date(),
            'amount' => $this->faker->numberBetween(1, 1000),
            'user_id' => $this->faker->name(),
            'comments' => $this->faker->text()
        ];
    }
}
