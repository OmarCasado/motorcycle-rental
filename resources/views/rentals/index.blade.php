@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16">
    <h1 class="text-2xl mb-2">My Rentals</h1>

    @if ($rentals->isEmpty())
        <p>You have no rentals yet.</p>
    @else
        <table>
            <th>
                <tr>
                    <th class="border-2 border-darkGray text-left px-2">Motorcycle</th>
                    <th class="border-2 border-darkGray text-left px-2">Start</th>
                    <th class="border-2 border-darkGray text-left px-2">End</th>
                    <th class="border-2 border-darkGray text-left px-2">Total Price (¥)</th>
                </tr>
            </th>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm">{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td>
                        <td class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm">{{ $rental->start_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm">{{ $rental->end_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-2 max-[900px]:text-sm">{{ number_format($rental->total_price) }}</td>
                        <td>
                            @if($rental->status === 'active')
                                <form action="{{ route('cancelMyRental', $rental->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-red ms-2">Cancel</button>
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
