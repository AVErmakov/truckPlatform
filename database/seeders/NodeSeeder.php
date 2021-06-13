<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create matrix 5x10 of nodes
        for ($y_axis = 1; $y_axis <= 5; $y_axis++) {
            for ($x_axis = 1; $x_axis <= 10; $x_axis++) {
                DB::table('nodes')->insert([
                    'longitude' => $x_axis,
                    'latitude' => $y_axis,
                ]);
            }
        }
    }
}
