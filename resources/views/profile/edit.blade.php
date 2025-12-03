@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color: red;" class="fixed px-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Edit Profile</h1>

    <form action="{{ route('updateMyProfile') }}" method="POST" class="flex flex-col items-center">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-semibold mb-1"> Name: </label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="leading-[1.5rem] mb-[10px] rounded-[5px] border border-darkGray py-0 font-sans" required>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-semibold mb-1">Email:</label>

            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="leading-[1.5rem] mb-[10px] rounded-[5px] border border-darkGray py-0 font-sans" required>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="btn btn-red">Save</button>

            <a href="{{ route('showMyProfile') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
