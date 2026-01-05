<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Rental;

class ReviewController extends Controller
{
    /**
     * レヴュー一覧を表示
     */
    public function index(){

    }

    /**
     * レヴューを保存
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $completedRental = Rental::where('user_id', $request->user()->id)
            ->where('motorcycle_id', $id)
            ->where('status', 'completed')
            ->first();

        dd($completedRental);

        if(!$completedRental) {
            return redirect()->route('showMotorcycle', $id)
                ->with('error', 'You can only review motorcycles you have rented.');
        }

        Review::create([
            'user_id'       => $request->user()->id,
            'motorcycle_id' => $id,
            'rating'        => $validated['rating'],
            'comment'       => $validated['comment'] ?? '',
        ]);

        return redirect()->route('showMotorcycle', $id)
            ->with('success', 'Review submitted.');
    }

    /**
     * レヴューを削除
     */
    public function delete()
    {

    }
}
