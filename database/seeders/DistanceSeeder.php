<?php

namespace Database\Seeders;

use App\Contracts\UtillsServiceInterface;
use App\Models\Load;
use App\Models\Node;
use App\Models\Town;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(LoadsServiceInterface $loadsService)
    {
//        echo '$town_2 = ' . $town_2;
//        echo '$node_2 = ' . $node_2;
        foreach (Town::all() as $town_1) {
            $node_1 = Node::where('id', $town_1->node_id)->first();
            foreach (Town::all() as $town_2) {
                $node_2 = Node::where('id', $town_2->node_id)->first();

                DB::table('distances')->insert([
            'distance' => $loadsService->findDistance($node_1, $node_2) * 50,
            'town_1_id' => $town_1->id,
            'town_2_id' => $town_2->id,
        ]);
            }
        }
    }
}
