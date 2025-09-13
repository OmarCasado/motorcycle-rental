<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function rent($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('motorcycles.rent', compact('motorcycle'));
    }
}
