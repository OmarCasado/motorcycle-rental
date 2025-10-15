@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Available Motorcycles</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cards Grid --}}
    <div class="flex gap-10 max-[900px]:flex-col max-[900px]:justify-center max-[900px]:items-center ">
        @foreach($motorcycles as $moto)
            <div class="border border-lightGray rounded-[25px] w-[350px] h-[500px] bg-gradient-to-b from-lightGray to-darkGray shadow-md hover:shadow-lg transition relative flex flex-col justify-start items-center max-[900px]:mb-[20px]">

                <!-- Image -->
                <a href="{{ route('showMotorcycle', $moto->id) }}" class="w-full">
                    <img
                        src="{{ $moto->image_path ? asset('storage/' . $moto->image_path) : asset('images/default.jpg') }}"
                        alt="{{ $moto->model }}"
                        class="w-[370px] hover:scale-125 transition">
                </a>

                <!-- Contents -->
                <div class="p-4 text-left w-full">
                    <h2 class="text-lg font-bold mb-2 text-white">
                        {{ strtoupper($moto->brand->name ?? 'N/A') }} {{ strtoupper($moto->model) }}
                    </h2>

                    <p class="text-sm text-white">Year: {{ $moto->year }}</p>
                    <p class="text-sm text-white">Color: {{ $moto->color }}</p>
                    <p class="text-sm text-white font-semibold mt-2">
                        ¥{{ number_format($moto->price_per_day) }}/day
                    </p>

                    {{-- Availability --}}
                    <div class="mt-2">
                        @if($moto->is_available)
                            <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">Available</span>
                        @else
                            <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded">Not Available</span>
                        @endif
                    </div>

                    {{-- Buttons --}}
                    <div class="mt-4 flex gap-1" >
                        {{-- View --}}
                        <a href="{{ route('showMotorcycle', $moto->id) }}"
                        class="block no-underline text-whiteCustom bg-blue-500 w-[80px] p-[8px] rounded-[8px] mx-auto 
                                hover:bg-blue-600 hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)]
                                transition duration-200 ease-in text-center text-sm">
                            View
                        </a>

                        @auth
                            {{-- Rent --}}
                            <a href="{{ route('rentMotorcycle', $moto->id) }}"
                            class="block no-underline text-whiteCustom bg-green-500 w-[80px] p-[8px] rounded-[8px] mx-auto 
                                    hover:bg-green-600 hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] 
                                    transition duration-200 ease-in text-center text-sm">
                                Rent
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('editMotorcycle', $moto->id) }}"
                            class="block no-underline text-whiteCustom bg-yellow-500 w-[80px] p-[8px] rounded-[8px] mx-auto 
                                    hover:bg-yellow-600 hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] 
                                    transition duration-200 ease-in text-center text-sm">
                                Edit
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('deleteMotorcycle', $moto->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')" class="mx-auto">
                                @csrf
                                <button type="submit"
                                        class="block w-[80px] p-[8px] rounded-[8px] mx-auto 
                                            bg-red-500 text-whiteCustom 
                                            hover:bg-red-600 hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] 
                                            transition duration-200 ease-in text-center text-sm">
                                    Delete
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @auth
        <div class="mt-6">
            <a href="{{ route('createMotorcycle') }}"
               class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
               + Add Motorcycle
            </a>
        </div>
    @endauth
</div>
@endsection
