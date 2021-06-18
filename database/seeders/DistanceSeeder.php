<?php

namespace Database\Seeders;

use App\Contracts\LoadsServiceInterface;
use App\Contracts\UtillsServiceInterface;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistanceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public
    function run()
    {
        foreach (Town::all() as $town_1) {
            foreach (Town::all() as $town_2) {
                $point_a = $town_1->id - 1;
                $point_b = $town_2->id - 1;
                $result = abs($point_a % 10 - $point_b % 10) +
                    abs(intdiv($point_a, 10) - intdiv($point_b, 10));

                DB::table('distances')->insert([
                    'distance' => $result * 50,
                    'town_1_id' => $town_1->id,
                    'town_2_id' => $town_2->id,
                ]);
            }
        }
    }
}
