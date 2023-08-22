<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'start' => fake()->time(),
            'end' => fake()->time(),
            'user_id' => fake()->numberBetween(1, 10),
            'field_id' => fake()->numberBetween(1, 2),
        ];
    }
}
