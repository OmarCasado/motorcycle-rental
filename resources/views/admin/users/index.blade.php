@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="text-green-700 px-4 py-3 rounded mb-4 min-[900px]:fixed">
        {{ session('success') }}
    </div>
@endif

<div class="h-screen flex justify-center flex-col items-center max-[900px]:px-16">
    <h1 class="text-2xl mb-2">User Management</h1>

    {{-- モバイル用のカード表示 --}}
    <div class="w-full sm:hidden">
        @foreach ($users as $user)
            <div class="rounded-xl border border-darkGray bg-white/70 shadow p-4 max-[900px]:mb-5">
                <div class="font-bold text-lg mb-1">
                    {{ $user->name }}
                </div>

                <div class="text-sm text-darkGray/90">
                    <div class="mb-1">
                        <span class="font-semibold">Email:</span>
                        <span class="font-sans">{{ $user->email }}</span>
                    </div>
                    <div class="mb-1">
                        <span class="font-semibold">Current Role:</span>
                        <span class="font-sans">{{ ucfirst($user->role) }}</span>
                    </div>
                    <div class="mb-1">
                        <span class="font-semibold">Change Role:</span>
                        <span class="font-sans">
                            <select name="role" form="mobile-update-user-role-{{ $user->id }}" class="p-1 w-24">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="mt-3">
                    <form id="mobile-update-user-role-{{ $user->id }}" action="{{ route('updateUserRole', $user->id) }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-red">Update</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- デスクトップ用のテーブル表示 --}}
    <div class="hidden sm:block overflow-x-auto">
        <table>
            <thead>
                <tr>
                    <th class="border-2 border-darkGray text-left px-2">Name</th>
                    <th class="border-2 border-darkGray text-left px-2">Email</th>
                    <th class="border-2 border-darkGray text-left px-2">Current Role</th>
                    <th class="border-2 border-darkGray text-left px-2">Change Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $user->name }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ $user->email }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">{{ ucfirst($user->role) }}</td>
                        <td class="border-2 border-darkGray text-left px-5 max-[900px]:text-sm max-[900px]:px-2">
                            <select name="role" form="pc-update-user-role-{{ $user->id }}" class="p-1 w-24">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </td>
                        <td>
                            <form id="pc-update-user-role-{{ $user->id }}" action="{{ route('updateUserRole', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-red ms-2">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
