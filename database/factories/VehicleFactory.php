<?php

namespace Database\Factories;

use App\Contracts\LoadsServiceInterface;
use App\Models\Town;
use App\Models\Vehicle;
use App\Models\VehicleType;
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
        $type = random_int(1, VehicleType::all()->count());
        $home = random_int(1, Town::all()->count());

        return [
            'vehicle_type_id' => $type,
            'home_location' => $home,
        ];
    }
}
