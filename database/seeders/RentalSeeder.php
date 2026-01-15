<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RentalSeeder extends Seeder
{
    public function run(): void
    {
        $userId = DB::table('users')->where('email', 'user@test.com')->value('id');
        $adminId = DB::table('users')->where('email', 'admin@test.com')->value('id');

        $motorcycleIds = DB::table('motorcycles')->pluck('id')->take(3)->values();

        if (!$userId || $motorcycleIds->count() < 1) {
            return;
        }

        $now = Carbon::now();

        $rentals = [];

        for ($i = 0; $i < 3; $i++) {
            $start = $now->copy()->addDays($i * 3)->setTime(10, 0);
            $end   = $start->copy()->addDays(2)->setTime(18, 0);

            $motorcycleId = $motorcycleIds[$i % $motorcycleIds->count()];

            $pricePerDay = DB::table('motorcycles')->where('id', $motorcycleId)->value('price_per_day');
            $totalPrice = (int) $pricePerDay * 2;

            $rentals[] = [
                'users_id'       => $userId,
                'motorcycle_id'  => $motorcycleId,
                'start_datetime' => $start,
                'end_datetime'   => $end,
                'total_price'    => $totalPrice,
                'status'         => 'active',
                'created_at'     => $now,
                'updated_at'     => $now,
            ];
        }

        DB::table('rentals')->insert($rentals);
    }
}
