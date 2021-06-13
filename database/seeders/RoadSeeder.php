<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($num = 1; $num <= 50; $num++) {
            $node_gorizontal = $num + 1;
            if ($num % 10 !== 0) {
                DB::table('roads')->insert([
                    'node_id_1' => $num,
                    'node_id_2' => $num + 1,
                    'distance' => 50,
                    'road_type_id' => 1,
                ]);
            }
            $node_vertical = $num + 10;
            if ($num <= 40 ) {
                DB::table('roads')->insert([
                    'node_id_1' => $num,
                    'node_id_2' => $num + 10,
                    'distance' => 50,
                    'road_type_id' => 2,
                ]);
            }
        }
    }
}
