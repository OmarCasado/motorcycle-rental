<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * ユ－ザ－のプロファイルを表示
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $totalRentals = Rental::where('user_id', $user->id)
            ->whereNot('status', 'canceled')
            ->count();

        $activeRentals = Rental::where('user_id', $user->id)
        ->where('status', 'active')->count();

        $totalSpent = Rental::where('user_id', $user->id)
            ->whereIn('status', ['active', 'completed'])
            ->sum('total_price');

        return view('profile.index', [
            'user' => $user,
            'totalRentals'  => $totalRentals,
            'activeRentals' => $activeRentals,
            'totalSpent'    => number_format($totalSpent),
        ]);
    }

    /**
     * ユ－ザ－情報編集ページを表示
     */
    public function edit() {
        $user = Auth::user();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
    * ユ－ザ－情報を編集
    */
    public function update(Request $request) {
        $user = Auth::user();

        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()
            ->route('showMyProfile')
            ->with('status', 'Profile updated successfully.');
        }
    }
