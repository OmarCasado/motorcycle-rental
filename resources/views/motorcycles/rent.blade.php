@extends('layouts.app')

@section('content')
<div class="container pt-[80px] h-screen">
    <h1>Rent {{ $motorcycle->brand }} {{ $motorcycle->model }}</h1>

    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('reserveMotorcycle', $motorcycle->id) }}" method="POST">
        @csrf

        <div>
            <label>Start (date & time)</label>
            <input type="datetime-local" name="start_datetime" value="{{ old('start_datetime') }}" required>
        </div>

        <div>
            <label>End (date & time)</label>
            <input type="datetime-local" name="end_datetime" value="{{ old('end_datetime') }}" required>
        </div>

        <div>
            <p>Price per day: ¥{{ number_format($motorcycle->price_per_day) }}</p>
        </div>

        <button type="submit">Reserve</button>
    </form>
</div>
@endsection