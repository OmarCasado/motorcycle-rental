<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandIds = DB::table('brands')
            ->whereIn('name', ['Harley-Davidson', 'Kawasaki', 'Yamaha'])
            ->pluck('id', 'name');

        DB::table('motorcycles')->insert([
            [
                'brand_id'      => $brandIds['Harley-Davidson'],
                'model'         => 'LiveWire',
                'year'          => 2020,
                'color'         => 'Orange',
                'price_per_day' => 10000,
                'is_available'  => true,
                'image_path'    => 'images/o-dan/o-dan_harley_livewire_transparent.png',
            ],
            [
                'brand_id'      => $brandIds['Kawasaki'],
                'model'         => 'Ninja 400',
                'year'          => 2022,
                'color'         => 'Green',
                'price_per_day' => 5500,
                'is_available'  => true,
                'image_path' => 'images/o-dan/o-dan_kawasaki_transparent.png',
            ],
            [
                'brand_id'      => $brandIds['Yamaha'],
                'model'         => 'R3',
                'year'          => 2021,
                'color'         => 'Blue',
                'price_per_day' => 6000,
                'is_available'  => false,
                'image_path' => 'images/o-dan/o-dan_yamaha_r3_transparent.png',
            ],
        ]);
    }
}
