<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminRentalController extends Controller
{
    /**
     * 管理者レンタル画面を表示
     */
    public function index(Request $request)
    {
        $rentals = Rental::with(['motorcycle', 'user'])
            ->orderBy('start_datetime', 'desc')
            ->get();

        return view('admin.rentals.index', compact('rentals'));
    }
}
