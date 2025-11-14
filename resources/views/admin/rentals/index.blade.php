@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16 overflow-x-auto">
    <h1 class="text-2xl mb-2">All Rentals (Admin Dashboard)</h1>

    @if ($rentals->isEmpty())
        <p>No rentals found.</p>
    @else
        {{-- モバイル用のカード表示 --}}
        <div class="w-full sm:hidden">
            @foreach ($rentals as $rental)
                <div class="rounded-xl border border-darkGray bg-white/70 shadow p-4">
                    <div class="font-bold text-lg mb-1">
                        {{ $rental->motorcycle->brand->name }} {{ $rental->motorcycle->model }}
                    </div>

                    <div class="text-sm text-darkGray/90">
                        <div class="mb-1">
                            <span class="font-semibold">User:</span>
                            {{ $rental->user->name }} ({{ $rental->user->email }})
                        </div>
                        <div class="mb-1">
                            <span class="font-semibold">Start:</span>
                            {{ $rental->start_datetime->format('Y/m/d H:i') }}
                        </div>
                        <div class="mb-1">
                            <span class="font-semibold">End:</span>
                            {{ $rental->end_datetime->format('Y/m/d H:i') }}
                        </div>
                        <div class="mb-1">
                            <span class="font-semibold">Total Price (¥):</span>
                            {{ number_format($rental->total_price) }}
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold">Status:</span>
                            <span class="inline-block rounded px-2 py-0.5 text-xs
                                        {{ $rental->status === 'active'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-gray-200 text-gray-700' }}">
                                {{ ucfirst($rental->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-3">
                        @if ($rental->status === 'active')
                            <form action="{{ route('cancelMyRental', $rental->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-red">Cancel</button>
                            </form>
                        @else
                            <span class="text-sm text-darkGray/70">—</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- デスクトップ用のテーブル表示 --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-max table-auto border-collapse">
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
        </div>
    @endif

</div>
@endsection
