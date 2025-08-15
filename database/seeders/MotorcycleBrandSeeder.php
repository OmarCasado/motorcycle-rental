<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorcycleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motorcycle_brands')->insert([
            ['name' => 'Honda'],
            ['name' => 'Suzuki'],
            ['name' => 'Yamaha'],
            ['name' => 'Kawasaki'],
        ]);
    }
}
