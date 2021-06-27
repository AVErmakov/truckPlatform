<?php

namespace Database\Seeders;

use App\Models\LoadType;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadTypeVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Vehicle::all() as $vehicle) {
            $vehicle_type = $vehicle->vehicle_type_id;
            $start = ($vehicle_type - 1) * 5 + 1;
//            dd ($start);
            $end = ($vehicle_type) * 5;
            for ($count = $start; $count <= $end; $count++) {
                $load_type = LoadType::where('id', $count)->first()->id;
                DB::table('load_type_vehicle')->insert([
                    'vehicle_id' => $vehicle->id,
                    'load_type_id' => $load_type,
                ]);
            }
        }
    }
}
