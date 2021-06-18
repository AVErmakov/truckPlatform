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
        $num_type = DB::table('vehicle_types')->count();
        $num_home_location = DB::table('towns')->count();

        for ($count = 1; $count <= 3; $count++) {
            $type = random_int(1, $num_type);
            $home = random_int(1, $num_home_location);
            DB::table('vehicles')->insert([
                'vehicle_type_id' => $type,
                'home_location' => $home,
            ]);
        }

    }
}
