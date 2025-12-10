<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * レヴュー一覧を表示
     */
    public function index(){
        //
    }

    /**
     * レヴューを保存
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
    }

    /**
     * レヴューを削除
     */
    public function delete()
    {
        //
    }
}
