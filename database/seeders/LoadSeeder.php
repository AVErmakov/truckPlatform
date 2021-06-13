<?php

namespace Database\Seeders;

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
        for ($count = 1; $count <=50; $count++) {
            $num = DB::table('towns')->count();
            $id_town_from = random_int(1, $num);
            $id_town_to = random_int(1, $num);

            DB::table('loads')->insert([
                'weight' => random_int(1,20),
                'from_town_id' => $id_town_from,
                'to_town_id' => $id_town_to,
            ]);        }

    }
}
