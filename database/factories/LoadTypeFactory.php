<?php

namespace Database\Factories;

use App\Models\LoadType;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoadTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LoadType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->unique()->text(20),
        ];
    }
}
