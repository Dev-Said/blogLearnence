<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'said',
            'email' => 'said.c@learnence.com',
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@a.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@a.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user3',
            'email' => 'user3@a.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user4',
            'email' => 'user4@a.com',
        ]);
    }
}
