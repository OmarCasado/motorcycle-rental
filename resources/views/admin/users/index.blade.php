@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex justify-center flex-col items-center max-[900px]:px-16">
    <h1 class="text-2xl mb-2">User Management</h1>

    @if (session('success'))
        <div class="text-green-700 px-4 py-3 rounded mb-4 pt-[90px]">
            {{ session('success') }}
        </div>
    @endif

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
                        <select name="role">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </td>

                    <td>
                        <form action="{{ route('updateUserRole', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-red ms-2">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
