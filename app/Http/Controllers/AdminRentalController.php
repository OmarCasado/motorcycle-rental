<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Carbon\Carbon;

class AdminRentalController extends Controller
{
    /**
     * 管理者レンタル画面を表示
     */
    public function index()
    {
        $rentals = Rental::with(['motorcycle', 'user'])
            ->orderBy('start_datetime', 'desc')
            ->get();

        return view('admin.rentals.index', compact('rentals'));
    }

    /**
     * バイクのレンタルをコンプリート
     */
    public function completeRental()
    {
        Rental::where('status', 'active')
            ->where('end_datetime', '<', Carbon::now())
            ->update(['status' => 'completed']);
    }
}
