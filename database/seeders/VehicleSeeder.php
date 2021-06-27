<?php

namespace Database\Seeders;

use App\Contracts\LoadsServiceInterface;
use App\Models\Vehicle;
use App\Services\LoadsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::factory()->count(10)->create();

    }
}
