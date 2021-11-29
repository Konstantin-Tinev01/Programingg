<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'room_number' => rand(100, 999), //$this->faker->random->number(100, 1000),
            'type_of_room' => 'small',
            'money_per_week' => rand(10, 30), //$this->faker->random->number(10, 30),
            'count_of_desks' => rand(5, 15), //$this->faker->random->number(5, 15),
            'room_manager' => 'ivan',
            'id_of_room_manager' => 0,
        ]);
    }
}
