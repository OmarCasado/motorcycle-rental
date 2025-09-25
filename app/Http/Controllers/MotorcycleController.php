<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorcycleController extends Controller
{
    public function index()
    {
        $motorcycles = Motorcycle::with('brand')->get();
        return view('motorcycles.index', compact('motorcycles'));
    }

    public function show($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('motorcycles.show', compact('motorcycle'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('motorcycles.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id'      => 'required',
            'model'         => 'required|string|max:255',
            'year'          => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'color'         => 'required|string|max:50',
            'price_per_day' => 'required|integer|min:0',
            'is_available'  => 'nullable',
            'image'         => 'nullable|image|max:2048',
        ]);

        $validated['is_available'] = $request->has('is_available');

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('motorcycles', 'public');
            $validated['image_path'] = $path;
        }

        Motorcycle::create($validated);

        return redirect()->route('topPage')
            ->with('success', 'Motorcycle added successfully!');
    }

    public function edit($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $brands = Brand::all();
        return view('motorcycles.edit', compact('motorcycle', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        $validated = $request->validate([
            'brand_id'      => 'required',
            'model'         => 'required|string|max:255',
            'year'          => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            'color'         => 'required|string|max:50',
            'price_per_day' => 'required|integer|min:0',
            'is_available'  => 'nullable',
            'image'         => 'nullable|image|max:2048',
        ]);


        if($request->hasFile('image')) {
            if($motorcycle->image_path && Storage::disk('public')->exists($motorcycle->image_path)) {
                Storage::disk('public')->delete($motorcycle->image_path);
            }

            $path = $request->file('image')->store('motorcycles', 'public');
            $validated['image_path'] = $path;
        }

        $validated['is_available'] = $request->has('is_available');

        $motorcycle->update($validated);

        return redirect()->route('topPage')
            ->with('success', 'Updated Successfully.');
    }

    public function delete($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $motorcycle->delete();

        return redirect()->route('topPage')
            ->with('success', 'Deleted Successfully.');
    }
}