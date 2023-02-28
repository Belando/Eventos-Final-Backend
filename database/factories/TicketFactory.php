<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $available_seats = range(1, 500);
        shuffle($available_seats);

        return [
            'name' => fake()->name(),
            'seat' => array_shift($available_seats),
            'date' => fake()->date()
        ];
    }
}
