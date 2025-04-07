<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dishes')->insert([
            'name' => 'Main Dish',
            'category_id' => 1,
        ]);
        DB::table('dishes')->insert([
            'name' => 'Side Dish',
            'category_id' => 2,
        ]);
        DB::table('dishes')->insert([
            'name' => 'Dessert',
            'category_id' => 3,
        ]);
    }
}
