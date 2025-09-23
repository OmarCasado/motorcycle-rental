@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-4xl font-bold text-red-600">Available Motorcycles</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Price per Day (¥)</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            @foreach($motorcycles as $moto)
                <tr>
                    <td>{{ $moto->brand->name ?? 'N/A' }}</td>
                    <td>{{ $moto->model }}</td>
                    <td>{{ $moto->year }}</td>
                    <td>{{ $moto->color }}</td>
                    <td>{{ number_format($moto->price_per_day) }}</td>
                    <td>{{ $moto->is_available ? 'Available' : 'Not Available' }}</td>
                    <td><a href="{{ route('showMotorcycle', $moto->id) }}">View</a></td>
                    @Auth
                        <td><a href="{{ route('editMotorcycle', $moto->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('deleteMotorcycle', $moto->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                <button type="Submit">Delete</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>

    @Auth
        <a href="{{ route('createMotorcycle') }}">+ Add Motorcycle</a>
    @endauth
</div>
@endsection
