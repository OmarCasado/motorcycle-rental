@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16">
    <h1 class="text-2xl mb-2">All Rentals (Admin Dashboard)</h1>

    @if ($rentals->isEmpty())
        <p>No rentals found.</p>
    @else
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Motorcycle</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Total Price (¥)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td>{{ $rental->user->name }} ({{ $rental->user->email }})</td>
                        <td>{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td>
                        <td>{{ $rental->start_datetime->format('Y/m/d H:i') }}</td>
                        <td>{{ $rental->end_datetime->format('Y/m/d H:i') }}</td>
                        <td>{{ number_format($rental->total_price) }}</td>
                        <td>{{ ucfirst($rental->status) }}</td>
                        <td>
                            @if ($rental->status === 'active')
                                <form action="{{ route('cancelMyRental', $rental->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit">Cancel</button>
                                </form>
                            @else
                                <span>-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
