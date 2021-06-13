<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('load_types')->insert([
            'type' => 'wood',
        ]);
        DB::table('load_types')->insert([
            'type' => 'wood',
        ]);
        DB::table('load_types')->insert([
            'type' => 'grocery',
        ]);
        DB::table('load_types')->insert([
            'type' => 'goods',
        ]);
    }
}
