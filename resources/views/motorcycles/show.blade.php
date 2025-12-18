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
<div class="flex justify-center flex-col items-center max-[900px]:px-16 overflow-x-auto">
    <h2 class="text-2xl mb-2">Reviews</h2>

    @if($reviews->isEmpty())
            <p>No reviews yet. Be the first to review this motorcycle!</p>
        @else
            @foreach($reviews as $review)
                <div class="rounded-xl border border-darkGray bg-white/70 shadow p-4 max-[900px]:mb-5 w-96">
                    <div>
                        <div class="flex justify-between">
                            <strong class="underline decoration-slate-400">{{ $review->user->name }} </strong>
                            <span class="font-sans text-gray-400">{{ $review->created_at }}</span>
                        </div>
                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <span class="text-yellow-400">★</span>
                                @else
                                    <span class="text-gray-300">★</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <p class="font-sans">{{ $review->comment }}</p>
                </div>
            @endforeach
        @endif
    @auth
        <h2 class="text-2xl mb-2 mt-8">Leave your rating</h2>

        <form action="{{ route('storeReview', $motorcycle->id) }}" method="post" class="mb-5">
            @csrf
            <h3>Rating: </h3>
            <div class="flex flex-row-reverse justify-end gap-1">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer" required />

                    <label for="star{{ $i }}" class="text-2xl cursor-pointer text-gray-300 hover:text-yellow-400 peer-checked:text-yellow-400">
                        ★
                    </label>
                @endfor
            </div>
            <br>

            <h3>Comment: </h3>
            <textarea name="comment" cols="50" rows="4" placeholder="Give us your opinion" class="resize-none px-[10px] mb-5 max-[900px]:w-96"></textarea>
            <br>

            <button type="submit" class="btn btn-red">Submit</button>
        </form>
    @endauth
</div>
@endsection