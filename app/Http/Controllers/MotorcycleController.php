<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Brand;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorcycleController extends Controller
{
    /**
     * トップページ
     */
    public function index()
    {
        $motorcycles = Motorcycle::with('brand')->get();
        return view('motorcycles.index', compact('motorcycles'));
    }

    /**
     * 指定したIDのバイク詳細ページを表示
     */
    public function show($id)
    {
        $motorcycle = Motorcycle::with(['brand'])->findOrFail($id);

        $activeRentals = Rental::query()
            ->where('motorcycle_id', $motorcycle->id)
            ->where('status', 'active')
            ->get();

        $disabledDateRanges = $activeRentals->map(function ($r) {
            $start = Carbon::parse($r->start_datetime)->toDateString();
            $end   = Carbon::parse($r->end_datetime)->subDay()->toDateString();
            return ['from' => $start, 'to' => $end];
        })->values();

        return view('motorcycles.show', [
            'motorcycle'         => $motorcycle,
            'disabledDateRanges' => $disabledDateRanges,
        ]);
    }

    /**
     * バイク追加フォームページを表示
     */
    public function create()
    {
        $brands = Brand::all();
        return view('motorcycles.create', compact('brands'));
    }

    /**
     * 新しいバイクを保存
     */
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

    /**
     * バイク編集フォームページを表示
     */
    public function edit($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        $brands = Brand::all();
        return view('motorcycles.edit', compact('motorcycle', 'brands'));
    }

    /**
     * バイク情報を更新
     */
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

    /**
     * バイク情報を削除
     */
    public function delete($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);

        if($motorcycle->image_path) {
            Storage::disk('public')->delete($motorcycle->image_path);
        }

        $motorcycle->delete();

        return redirect()->route('topPage')
            ->with('success', 'Deleted Successfully.');
    }
}