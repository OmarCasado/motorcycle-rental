@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Edit Profile</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-[10px] border border-red-400 bg-red-100 px-4 py-3 text-red-700">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li class="font-sans">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateMyProfile', $user->id) }}" method="post" class="flex flex-col items-center">
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
