<?php

namespace Database\Seeders;

use App\Models\Town;
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
//            Type == 1 is highway
//
            $road_type = 1;
            if (Town::where('node_id', $num)->first()
                || Town::where('node_id', $num + 1)->first()) {
                $road_type = 2;
            }
            if ($num % 10 !== 0) {
                DB::table('roads')->insert([
                    'node_id_1' => $num,
                    'node_id_2' => $num + 1,
                    'distance' => 50,
                    'road_type_id' => $road_type,
                ]);
            }
            if (Town::where('node_id', $num)->first()
                || Town::where('node_id', $num + 10)->first()) {
                $road_type = 2;
            }
            if ($num <= 40) {
                DB::table('roads')->insert([
                    'node_id_1' => $num,
                    'node_id_2' => $num + 10,
                    'distance' => 50,
                    'road_type_id' => $road_type,
                ]);
            }
        }
    }
}
