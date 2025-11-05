@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center">
    <h1 class="text-2xl mb-2">My Rentals</h1>

    @if ($rentals->isEmpty())
        <p>You have no rentals yet.</p>
    @else
        <table>
            <th class="border"ead>
                <tr>
                    <th class="border">Motorcycle</th class="border">
                    <th class="border">Start</th class="border">
                    <th class="border">End</th class="border">
                    <th class="border">Total Price (¥)</th class="border">
                </tr>
            </th class="border"ead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="border">{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td class="border">
                        <td class="border">{{ $rental->start_datetime->format('Y-m-d H:i') }}</td class="border">
                        <td class="border">{{ $rental->end_datetime->format('Y-m-d H:i') }}</td class="border">
                        <td class="border">{{ number_format($rental->total_price) }}</td class="border">
                        <td class="border">
                            @if($rental->status === 'active')
                                <form action="{{ route('cancelMyRental', $rental->id) }}" meth class="border"od="post">
                                    @csrf
                                    <button type="submit">Cancel</button>
                                </form>
                            @else
                                <span>{{ ucfirst($rental->status) }}</span>
                            @endif
                        </td class="border">
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
