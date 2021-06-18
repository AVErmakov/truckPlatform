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
                $id = ($y_axis - 1) * 10 + $x_axis;
//                Type == 3 - town
//                Type == 1 - highway
                $type = 3;
                if (( $id>= 12 && $id <=19) || ( $id>= 32 && $id <=39)) {
                    $type = 1;
                }

                DB::table('nodes')->insert([
                    'longitude' => $x_axis,
                    'latitude' => $y_axis,
                    'node_type_id' => $type,
                ]);
            }
        }
    }
}
