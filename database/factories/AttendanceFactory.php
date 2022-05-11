<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
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
            'men' => $this->faker->numberBetween(0, 100),
            'women' => $this->faker->numberBetween(0, 100),
            'children' => $this->faker->numberBetween(0, 100),
            'visitors' => $this->faker->numberBetween(0, 100),
            'comments' => $this->faker->text(5)
        ];
    }
}
