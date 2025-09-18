<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class AdminRentalController extends Controller
{
    public function index(Request $request)
    {
        $rentals = Rental::with(['motorcycle', 'user'])
            ->orderBy('start_datetime', 'desc')
            ->get();

        return view('admin.rentals.index', compact('rentals'));
    }
}
