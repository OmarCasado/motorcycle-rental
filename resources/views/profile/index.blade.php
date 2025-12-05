@extends('layouts.app')

@section('content')
<div class="pt-[80px] min-h-screen max-w-4xl mx-auto px-4">

    @if (session('status'))
        <div class="mb-4 rounded-[10px] border border-green-400 bg-green-100 px-4 py-3 text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="text-2xl mb-2">My Profile</h1>

    <div class="grid gap-6 md:grid-cols-2">

        {{-- アカウント情報カ－ド --}}
        <div class="rounded-[10px] border border-gray-200 bg-white/80 p-5 shadow-sm">
            <h2 class="mb-4 text-xl font-semibold">Account information</h2>

            @php
                $roleLabel = $user->role === 'admin' ? 'Admin' : 'User';
            @endphp

            <dl class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <dt class="font-semibold">Name</dt>
                    <dd class="font-sans">{{ $user->name }}</dd>
                </div>

                <div class="flex justify-between">
                    <dt class="font-semibold">Email</dt>
                    <dd class="font-sans">{{ $user->email }}</dd>
                </div>

                <div class="flex justify-between">
                    <dt class="font-semibold">Role</dt>
                    <dd class="font-sans">{{ $roleLabel }}</dd>
                </div>

                <div class="flex justify-between">
                    <dt class="font-semibold">Member since</dt>
                    <dd class="font-sans">
                        {{ $user->created_at->format('Y/m/d') }}
                    </dd>
                </div>
            </dl>

            <a href="{{ route('editMyProfile') }}" class="mt-5 inline-block rounded-[10px] bg-greenCustom px-4 py-2 text-sm font-medium text-whiteCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">
                Edit profile
            </a>
        </div>

        {{-- レンタル情報カ－ド --}}
        <div class="rounded-[10px] border border-gray-200 bg-white/80 p-5 shadow-sm">
            <h2 class="mb-4 text-xl font-semibold">Rental summary</h2>

            <ul class="space-y-3 text-sm">
                <li class="flex justify-between">
                    <span class="font-semibold">Total rentals</span>
                    <span class="font-sans">{{ $totalRentals }}</span>
                </li>

                <li class="flex justify-between">
                    <span class="font-semibold">Active rentals</span>
                    <span class="font-sans">{{ $activeRentals }}</span>
                </li>

                <li class="flex justify-between">
                    <span class="font-semibold">Total spent (¥)</span>
                    <span class="font-sans">
                        {{ $totalSpent }}
                    </span>
                </li>
            </ul>

            <a href="{{ route('showMyRentals') }}"
               class="mt-5 inline-block rounded-[10px] bg-greenCustom px-4 py-2 text-sm font-medium text-whiteCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">
                View all my rentals
            </a>
        </div>

    </div>
</div>
@endsection
