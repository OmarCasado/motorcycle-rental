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

    public function show($id) {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('motorcycles.show', compact('motorcycle'));
    }
}
