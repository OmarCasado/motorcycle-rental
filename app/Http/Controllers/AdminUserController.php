<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * ユ－ザ－一覧ページを表示
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('showUsers', compact('users'));
    }

    /**
     * ユ－ザ－権限を変更
     */
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('showUsers')
            ->with('success', "Role updated for {$user->name}");
    }
}