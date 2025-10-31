@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="container pt-[80px] h-screen flex justify-center max-[900px]:flex-col">

    <img src="{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('images/default.jpg') }}"
         alt="{{ $motorcycle->model }}">

    <div class="flex flex-col justify-center">
        <h1 class="text-2xl mb-2">{{ $motorcycle->brand->name }} {{ $motorcycle->model }}</h1>

        <ul>
            <li><strong>Year:</strong><span class="font-sans"> {{ $motorcycle->year }}</span> </li>
            <li><strong>Color:</strong><span class="font-sans"> {{ $motorcycle->color }}</span> </li>
            <li><strong>Price per Day (¥):</strong><span class="font-sans"> {{ number_format($motorcycle->price_per_day) }}</span></li>
            <li><strong>Available:</strong><span class="font-sans"> {{ $motorcycle->is_available ? 'Yes' : 'No' }}</span></li>
        </ul>

        <a href="{{ route('topPage') }}" class="mt-2 bg-redCustom text-white w-fit p-[10px] rounded-[10px] hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">← Back to list</a>
    </div>


</div>
@endsection