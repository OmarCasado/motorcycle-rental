@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="text-green-700 px-4 py-3 rounded mb-4 min-[900px]:fixed">
        {{ session('success') }}
    </div>
@endif

<div class="pt-[80px] min-[900px]:h-screen flex justify-center gap-5 max-[900px]:flex-col max-[900px]:items-center">

    <img src="{{ $motorcycle->image_path ? asset('storage/' . $motorcycle->image_path) : asset('images/default.jpg') }}" alt="{{ $motorcycle->model }}">

    <div class="flex flex-col justify-center">
        <h1 class="text-2xl mb-2">{{ $motorcycle->brand->name }} {{ $motorcycle->model }}</h1>

        <ul>
            <li><strong>Year:</strong><span class="font-sans"> {{ $motorcycle->year }}</span> </li>
            <li><strong>Color:</strong><span class="font-sans"> {{ $motorcycle->color }}</span> </li>
            <li><strong>Price per Day (¥):</strong><span class="font-sans"> {{ number_format($motorcycle->price_per_day) }}</span></li>
            <li><strong>Available:</strong><span class="font-sans"> {{ $motorcycle->is_available ? 'Yes' : 'No' }}</span></li>
        </ul>

        <div class="flex gap-2">
            <a href="{{ route('topPage') }}" class="mt-2 bg-redCustom text-white w-fit p-[10px] rounded-[10px] hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">← Back</a>
            @auth
                <a href="{{ route('rentMotorcycle', $motorcycle->id) }}" class="mt-2 text-whiteCustom bg-greenCustom w-fit  p-[10px] rounded-[10px] hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">Rent</a>
            @endauth
        </div>
    </div>

    <div class="flex flex-col justify-center">
        @include('layouts.calendar')
    </div>
</div>

{{-- コメントセクション --}}
<div>
    <h2 class="text-2xl mb-2">Leave your rating</h2>

    <form action="{{ route('storeReview', $motorcycle->id) }}" method="post">
        @csrf

        <div class="flex flex-row-reverse justify-end gap-1">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required />

                <label for="star{{ $i }}" class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400 peer-checked:text-yellow-400">
                    ★
                </label>
            @endfor
        </div>
        <br>

        <textarea name="comment" cols="50" rows="4" placeholder="Give us your opinion" class="resize-none px-[10px] mb-5"></textarea>
        <br>

        <button type="submit" class="btn btn-red">Submit</button>
    </form>
</div>
@endsection