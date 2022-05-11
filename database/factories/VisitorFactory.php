<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'purpose_of_visit' => $this->faker->text(5),
            'comments' => $this->faker->text(5)
        ];
    }
}
