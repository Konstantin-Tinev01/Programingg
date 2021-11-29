<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desks')->insert([
            'client_id' => rand(1, 1000),
            'room' => rand(1, 1000),
            'room_manager' => rand(1, 1000),
            'price' => 0,
            'size' => 'n',
            'position' => 'n',
            'is_taken' => 0,
            'time_for_taken' => now(),
        ]);
    }
}
