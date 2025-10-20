<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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