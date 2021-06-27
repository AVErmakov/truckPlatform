<?php

namespace Database\Factories;

use App\Models\Distance;
use App\Models\Load;
use App\Models\SearchSetting;
use App\Models\Town;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class SearchSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SearchSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        TODO: make calculating of $loading_capacity
        $loading_capacity = 20;
        $num_town = Town::all()->count();
        $num_vehicle = Vehicle::all()->count();
        $num_load = Load::all()->count();
        $id_town_start = random_int(1, $num_town);
        $id_town_finish = random_int(1, $num_town);
        $vehicle_id = random_int(1, $num_vehicle);
//        $load_type_id = random_int(1, $num_load);
        $start_loading = new \DateTime("now");
        $start_loading->sub(new \DateInterval('P1D'));
        $finish_loading = new \DateTime("now");
        $finish_loading->add(new \DateInterval('P100D'))
            ->setTime(18, 0);
//        dd($finish_loading);

        return [
            'vehicle_id' => $vehicle_id,
            'from_town_id' => $id_town_start,
            'to_town_id' => $id_town_finish,
            'loading_capacity' => $loading_capacity,
//            'load_type_id' => $load_type_id,
            'start_loading' => $start_loading,
            'finish_loading' => $finish_loading,
        ];
    }
}
