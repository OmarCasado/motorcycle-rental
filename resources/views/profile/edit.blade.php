@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Edit Profile</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateMyProfile') }}" method="post" class="flex flex-col items-center">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-semibold mb-1"> Name </label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded-[8px] border border-gray-300 px-3 py-2 font-sans focus:border-greenCustom focus:outline-none focus:ring-1 focus:ring-greenCustom" required>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-semibold mb-1">Email</label>

            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded-[8px] border border-gray-300 px-3 py-2 font-sans focus:border-greenCustom focus:outline-none focus:ring-1 focus:ring-greenCustom" required>
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="btn btn-red">Save</button>

            <a href="{{ route('showMyProfile') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
    </form>
</div>
@endsection
