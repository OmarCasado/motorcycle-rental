<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * ユ－ザ－のプロファイルを表示
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $totalRentals = Rental::where('user_id', $user->id)->count();

        $activeRentals = Rental::where('user_id', $user->id)
        ->where('status', 'active')->count();

        $totalSpent = Rental::where('user_id', $user->id)
            ->where('status', 'active')
            ->orWhere('status', 'completed')
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
    public function edit($id) {
        $user = User::findOrFail($id);

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
    * ユ－ザ－情報を編集
    */
    public function update(Request $request) {
        $user = $request->user;

        $validated = $request->validate([
        'name'  => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->save();


    }

}