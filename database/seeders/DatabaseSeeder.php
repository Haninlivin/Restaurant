<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DishTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\TableTableSeeder;
use Database\Seeders\CategoryTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            UserTableSeeder::class,
            TableTableSeeder::class,
            DishTableSeeder::class,
            CategoryTableSeeder::class,
        ]);
    }
}
