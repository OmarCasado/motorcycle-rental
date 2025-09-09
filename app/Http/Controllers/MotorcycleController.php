<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Brand;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index() {
        $motorcycles = Motorcycle::with('brand')->get();
        return view('motorcycles.index', compact('motorcycles'));
    }

    public function show($id) {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('motorcycles.show', compact('motorcycle'));
    }

    public function create() {
        $brands = Brand::all();
        return view('motorcycles.create', compact('brands'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'brand_id'      => 'required',
            'model'         => 'required|string|max:255',
            'year'          => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'color'         => 'required|string|max:50',
            'price_per_day' => 'required|integer|min:0',
            'is_available'  => 'nullable',
        ]);

        $validated['is_available'] = $request->has('is_available');

        Motorcycle::create($validated);

        return redirect()->route('topPage')
            ->with('success', 'Motorcycle added successfully!');
    }
}
