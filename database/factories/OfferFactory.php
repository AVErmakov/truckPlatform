<?php

namespace Database\Factories;

use App\Models\Load;
use App\Models\Offer;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $num_load = Load::all()->count();
        $load = Load::where('id', random_int(1, $num_load))->first();
        $num_vehicle = Vehicle::all()->count();
        $vehicle = Vehicle::where('id', random_int(1, $num_vehicle))->first();
        $now = new \DateTime();
        return [
            'load_id' => $load->id,
            'vehicle_id' => $vehicle->id,
            'offer_price' => $load->price,
            'offer_time' => $now,
        ];
    }
}
