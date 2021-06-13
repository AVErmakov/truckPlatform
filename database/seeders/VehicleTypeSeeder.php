<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->insert([
            'type' => 'Van',
        ]);
        DB::table('vehicle_types')->insert([
            'type' => 'Refer',
        ]);
        DB::table('vehicle_types')->insert([
            'type' => 'StepDesk',
        ]);
        DB::table('vehicle_types')->insert([
            'type' => 'Flat',
        ]);
    }
}
