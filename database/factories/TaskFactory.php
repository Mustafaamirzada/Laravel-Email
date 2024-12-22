<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(50),
            'description' => fake()->text(),
            'created_at' => fake()->dateTimeBetween('now', '+1 month'),
            'updated_at' => fake()->dateTimeBetween('+1 month', '+2 months')
        ];
    }
}
