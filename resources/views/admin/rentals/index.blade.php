@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16 overflow-x-auto">
    <h1 class="text-2xl mb-2">All Rentals (Admin Dashboard)</h1>

    @if ($rentals->isEmpty())
        <p>No rentals found.</p>
    @else
        {{-- モバイル用のカード表示 --}}

        {{-- デスクトップ用のテーブル表示 --}}
        <table>
            <thead>
                <tr>
                    <th class="border-2 border-darkGray text-left px-2">User</th>
                    <th class="border-2 border-darkGray text-left px-2">Motorcycle</th>
                    <th class="border-2 border-darkGray text-left px-2">Start</th>
                    <th class="border-2 border-darkGray text-left px-2">End</th>
                    <th class="border-2 border-darkGray text-left px-2">Total Price (¥)</th>
                    <th class="border-2 border-darkGray text-left px-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="border-2 border-darkGray text-left px-5">{{ $rental->user->name }} ({{ $rental->user->email }})</td>
                        <td class="border-2 border-darkGray text-left px-5">{{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}</td>
                        <td class="border-2 border-darkGray text-left px-5">{{ $rental->start_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-5">{{ $rental->end_datetime->format('Y/m/d H:i') }}</td>
                        <td class="border-2 border-darkGray text-left px-5">{{ number_format($rental->total_price) }}</td>
                        <td class="border-2 border-darkGray text-left px-5">{{ ucfirst($rental->status) }}</td>
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
