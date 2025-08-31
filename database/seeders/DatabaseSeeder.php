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
    \App\Models\User::factory()->create([
        'username' => 'demo',
        'email' => 'demo@example.com',
        'password' => bcrypt('password'),
    ]);

    \App\Models\Contact::factory(20)->create([
        'user_id' => 1,
    ]);
    }
}
