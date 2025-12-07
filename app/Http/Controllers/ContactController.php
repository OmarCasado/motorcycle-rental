<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    /**
     * お問い合わせページを表示
     */
    public function index()
    {
        return view('contact.index');
    }
}
