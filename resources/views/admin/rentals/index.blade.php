@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16">
    <h1 class="text-2xl mb-2">All Rentals (Admin Dashboard)</h1>

    @if ($rentals->isEmpty())
        <p>No rentals found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">User</th>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">Motorcycle</th>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">Start</th>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">End</th>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">Total Price (¥)</th>
                    <th class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm max-[900px]:px-1">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $rental->user->name }} ({{ $rental->user->email }})</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $rental->start_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $rental->end_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ number_format($rental->total_price) }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ ucfirst($rental->status) }}</td>
                        <td>
                            @if ($rental->status === 'active')
                                <form action="{{ route('cancelMyRental', $rental->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-red ms-2">Cancel</button>
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
