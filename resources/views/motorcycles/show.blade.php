@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="container pt-[80px] h-screen">
    <h1>{{ $motorcycle->brand }} {{ $motorcycle->model }}</h1>

    <ul>
        <li><strong>Year:</strong> {{ $motorcycle->year }}</li>
        <li><strong>Color:</strong> {{ $motorcycle->color }}</li>
        <li><strong>Price per Day (¥):</strong> {{ number_format($motorcycle->price_per_day) }}</li>
        <li><strong>Available:</strong> {{ $motorcycle->is_available ? 'Yes' : 'No' }}</li>
    </ul>

    <a href="{{ route('topPage') }}">← Back to list</a>
</div>

@endsection