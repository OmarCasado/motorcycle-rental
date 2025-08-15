<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motorcycles')->insert([
        [
            'brand'         => 'Honda',
            'model'         => 'CB400 Super Four',
            'year'          => 2020,
            'color'         => 'Black',
            'price_per_day' => 4500,
            'is_available'  => true,
        ],
        [
            'brand'         => 'Yamaha',
            'model'         => 'MT-07',
            'year'          => 2022,
            'color'         => 'Blue',
            'price_per_day' => 5500,
            'is_available'  => true,
        ],
        [
            'brand'         => 'Kawasaki',
            'model'         => 'Ninja 400',
            'year'          => 2021,
            'color'         => 'Green',
            'price_per_day' => 6000,
            'is_available'  => false,
        ],
        ]);
    }
}
