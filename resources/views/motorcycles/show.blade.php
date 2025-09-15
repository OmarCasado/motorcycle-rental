@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $motorcycle->brand }} {{ $motorcycle->model }}</h1>

    <ul>
        <li><strong>Year:</strong> {{ $motorcycle->year }}</li>
        <li><strong>Color:</strong> {{ $motorcycle->color }}</li>
        <li><strong>Price per Day (¥):</strong> {{ number_format($motorcycle->price_per_day) }}</li>
        <li><strong>Available:</strong> {{ $motorcycle->is_available ? 'Yes' : 'No' }}</li>
    </ul>

    <a href="{{ route('topPage') }}">← Back to list</a>
</div>

@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@endsection
