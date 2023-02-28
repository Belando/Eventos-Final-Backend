<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'description' => $this->faker->text(),
            'type'=> $this -> faker -> text(),
            'hall_id'=>rand(1,3),
            'ticket_id'=>rand(1,3),
            'organizer_id'=>rand(1,3),
        ];
    }
}
