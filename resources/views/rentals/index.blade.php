@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Rentals</h1>

    @if ($rentals->isEmpty())
        <p>You have no rentals yet.</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Motorcycle</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Total Price (¥)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td>
                        <td>{{ $rental->start_datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ $rental->end_datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ number_format($rental->total_price) }}</td>
                        <td>
                            @if($rental->status === 'active')
                                <form action="{{ route('cancelMyRental', $rental->id) }}" method="post">
                                    @csrf
                                    <button type="submit">Cancel</button>
                                </form>
                            @else
                                <span>{{ ucfirst($rental->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
