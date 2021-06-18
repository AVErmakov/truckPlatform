<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NodeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('node_types')->insert([
            'type' => 1,
        ]);
        DB::table('node_types')->insert([
            'type' => 2,
        ]);
        DB::table('node_types')->insert([
            'type' => 3,
        ]);
    }
}
