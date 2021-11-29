<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1,  1000),
            'room' => $this->faker->numberBetween(1,  1000),
            'room_manager' => $this->faker->numberBetween(1,  1000),
            'price' => 0,
            'size' => 'n',
            'position' => 'n',
            'is_taken' => 0,
            'time_for_taken' => now(),
        ];
    }
}
