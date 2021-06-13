<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Create matrix 10x5 of nodes
        $this->call(NodeSeeder::class);
        $this->call(TownSeeder::class);
        $this->call(RoadTypeSeeder::class);
        $this->call(RoadSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(LoadTypeSeeder::class);
        $this->call(LoadSeeder::class);
    }
}
