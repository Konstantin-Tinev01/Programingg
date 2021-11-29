<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' => 0000,
            'type_of_room' => '---',
            'money_per_week' => 0,
            'count_of_desks' => 0,
            'room_manager' => '----',
            'id_of_room_manager' => 0,
        ];
    }
}
