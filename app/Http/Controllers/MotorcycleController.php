<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index() {
        $motorcycles = Motorcycle::all();
        return view('motorcycles.index', compact('motorcycles'));
    }
}
