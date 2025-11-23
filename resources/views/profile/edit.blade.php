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

    <form action="" method="post" class="flex flex-col items-center">
        @csrf
        <h1>{{ $user }}</h1>
        <button type="submit" class="mt-2 btn btn-red">Update</button>
    </form>
</div>
@endsection
