<?php

namespace Database\Seeders;

use App\Models\Node;
use App\Models\Town;
use Database\Factories\TownFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($num = 1; $num <= 50; $num++) {
            $num_bool = (($num <= 11 || $num >= 20) && ($num != 22) && ($num != 29))
            && ($num <= 31 || $num >= 40);
            if ($num_bool) {
                $node_id = Node::where('id', $num)->first()->id;
                $town_name = Town::factory()->make()->name;
                DB::table('towns')->insert([
                    'name' => $town_name,
                    'node_id' => $node_id,
                ]);
            }
        }
    }
}
