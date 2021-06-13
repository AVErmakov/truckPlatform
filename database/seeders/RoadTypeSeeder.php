<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('road_types')->insert([
            'title' => 'normal',
        ]);
        DB::table('road_types')->insert([
            'title' => 'without_dangerous',
        ]);
        DB::table('road_types')->insert([
            'title' => 'wit_extra_payment',
        ]);
    }
}
