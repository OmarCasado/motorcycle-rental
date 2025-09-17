<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function rent($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('motorcycles.rent', compact('motorcycle'));
    }

    public function reserve(Request $request, $id)
    {
        $request->validate([
            'start_datetime' => 'required|string',
            'end_datetime'   => 'required|string',
        ]);

        // レンタル日時をフォーマット
        try {
            $start = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_datetime);
            $end = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_datetime);
        } catch (\Exception $e) {
            return back()
                ->withErrors(['datetime' => 'Invalid date or time format.'])
                ->withInput();
        }

        // レンタル日時をチェック
        if($start >= $end) {
            return back()
                ->withErrors(['end_datetime' => 'End must be after start'])
                ->withInput();
        }
        if($start < now()) {
            return back()
                ->withErrors(['start_datetime' => 'Start must be in the future or now.'])
                ->withInput();
        }

        // レンタル日時が開いてるかチェック
        $overlapingDateTime = Rental::where('motorcycle_id', $id)
            ->where('start_datetime', '<', $end)
            ->where('end_datetime', '>', $start)
            ->exists();

        if($overlapingDateTime) {
            return back()
                ->withErrors(['unavailable' => 'This motorcycle is not available for the selected period.'])
                ->withInput();
        }

        // レンタル費用を計算。一日ごとレンタルする。
        $days = (int) $start->diffInDays($end);

        if($days === 0) {
            $days = 1;
        }

        $motorcycle = Motorcycle::findOrFail($id);
        $totalPrice = $motorcycle->price_per_day * $days;

        // 予約する
        $rental = Rental::create([
            'user_id'        => $request->user()->id,
            'motorcycle_id'  => $id,
            'start_datetime' => $start,
            'end_datetime'   => $end,
            'total_price'    => $totalPrice,
        ]);

        return redirect()->route('showMotorcycle', $id)
            ->with('success', "Reservation created. Total: ¥" . number_format($totalPrice));
    }
}
