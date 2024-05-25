<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'score' => fake()->numberBetween(1, 5),
            'content' => fake()->paragraph(),
            'status' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1, 2),
            'field_id' => fake()->numberBetween(1, 2),
        ];
    }
}
