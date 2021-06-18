<?php

namespace Database\Factories;

use App\Contracts\LoadsServiceInterface;
use App\Models\Vehicle;
use App\Services\LoadsService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $loadsService = new LoadsService();
//        $result = $loadsService->newVehicle();
        $num_type = DB::table('vehicle_types')->count();
        $num_home_location = DB::table('towns')->count();

        $type = random_int(1, $num_type);
        $home = random_int(1, $num_home_location);
        $result = new Vehicle();
        $result->vehicle_type_id = $num_type;
        $result->home_location = $num_home_location;

        return [
            'vehicle_type_id' => $result->vehicle_type_id,
            'home_location' => $result->home_location,
        ];
    }
}
