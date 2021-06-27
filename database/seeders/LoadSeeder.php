<?php

namespace Database\Seeders;

use App\Contracts\LoadsServiceInterface;
use App\Models\Distance;
use App\Models\Load;
use App\Models\Town;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Load::factory()->count(50)->create();
    }
}
