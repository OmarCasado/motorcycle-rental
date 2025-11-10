@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center">
    <h1>Rent {{ $motorcycle->brand->name }} {{ $motorcycle->model }}</h1>

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

    <table>
      <tr>
        <td>Start: </td>
        <td><input type="datetime-local" name="start_datetime" value="{{ old('start_datetime') }}" required></td>
      </tr>

      <tr>
        <td>End: </td>
        <td><input type="datetime-local" name="end_datetime" value="{{ old('end_datetime') }}" required></td>
      </tr>

      <tr>
        <td><p>Price per day: </p></td>
        <td><p>¥{{ number_format($motorcycle->price_per_day) }}</p></td>
      </tr>
    </table>

        <button type="submit" class="btn btn-red">Reserve</button>
    </form>
</div>
@endsection