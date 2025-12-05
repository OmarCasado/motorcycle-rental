@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color: red;" class="fixed px-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pt-[80px] min-[900px]:h-screen flex justify-center items-center gap-10 max-[900px]:flex-col">

  <div class="flex flex-col max-[900px]:items-center">
    <h1 class="text-2xl mb-2">Rent {{ $motorcycle->brand->name }} {{ $motorcycle->model }}</h1>

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

  <div>
    @include('layouts.calendar')
  </div>
</div>
@endsection