<?php

namespace Database\Seeders;

use App\Contracts\LoadsServiceInterface;
use App\Models\Distance;
use App\Models\Load;
use App\Models\Town;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Load::factory()->create([
//            ''
//        ]);

        for ($count = 1; $count <= 50; $count++) {
            $num = DB::table('towns')->count();
            $id_town_from = random_int(1, $num);
            $id_town_to = random_int(1, $num);
            $distance = Distance::where('town_1_id', $id_town_from)
                ->where('town_2_id', $id_town_to)->first()->distance;
//            echo 'distance = ' . $distance . PHP_EOL;
            $weight = random_int(1, 20);
            $price = $weight * $distance + 10;

            DB::table('loads')->insert([
                'weight' => $weight,
                'from_town_id' => $id_town_from,
                'to_town_id' => $id_town_to,
                'price' => $price,
            ]);
        }

    }
}
