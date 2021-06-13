<?php

namespace Database\Factories;

use App\Models\Load;
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
        $amount = Town::all()->count();
        echo $amount;
        return [
            'weight' => random_int(1,20),
            'from_town_id' => 1,
            'to_town_id' => 2,
        ];
    }
}
