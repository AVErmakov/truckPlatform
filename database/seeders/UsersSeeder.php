<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        /** @var Hasher $hasher */
        $hasher = app()->make(Hasher::class);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => $hasher->make('password'),
        ]);
    }
}
