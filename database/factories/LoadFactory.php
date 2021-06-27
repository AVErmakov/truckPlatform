<?php

namespace Database\Factories;

use App\Models\Distance;
use App\Models\Load;
use App\Models\LoadType;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Load::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $num = Town::all()->count();
        $id_town_from = random_int(1, $num);
        $id_town_to = random_int(1, $num);
        $distance = Distance::where('town_1_id', $id_town_from)
            ->where('town_2_id', $id_town_to)->first()->distance;
//            echo 'distance = ' . $distance . PHP_EOL;
        $weight = random_int(1, 20);
        $price = $weight * $distance + 10;
        $start_loading = new \DateTime(date('d-m-Y'));
        $start_loading->setTime(10, 0);
        $finish_loading_day = random_int(0, 2);
        $finish_loading = new \DateTime(date('d-m-Y'));
        $finish_loading->add(new \DateInterval('P' . $finish_loading_day . 'D'))
            ->setTime(18, 0);
        $load_types_id = random_int(1, LoadType::all()->count());
        return [
            'weight' => $weight,
            'from_town_id' => $id_town_from,
            'to_town_id' => $id_town_to,
            'load_types_id' => $load_types_id,
            'start_loading' => $start_loading,
            'finish_loading' => $finish_loading,
            'price' => $price,

        ];
    }
}
