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
        // \App\Models\User.php::factory(10)->create();

        // \App\Models\User.php::factory()->create([
        //     'name' => 'Test User.php',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(genderTableSeeder::class);
    }
}
