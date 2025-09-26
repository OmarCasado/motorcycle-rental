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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($motorcycles as $moto)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                <!-- Imagen -->
                <a href="{{ route('showMotorcycle', $moto->id) }}">
                    <img
                        src="{{ $moto->image_path ? asset('storage/' . $moto->image_path) : asset('images/default.jpg') }}"
                        alt="{{ $moto->model }}"
                        class="w-full h-48 object-cover">
                </a>

                <!-- Contents -->
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2">
                        {{ $moto->brand->name ?? 'N/A' }} {{ $moto->model }}
                    </h2>
                    <p class="text-sm text-gray-600">Year: {{ $moto->year }}</p>
                    <p class="text-sm text-gray-600">Color: {{ $moto->color }}</p>
                    <p class="text-sm text-gray-800 font-semibold mt-2">
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
                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="{{ route('showMotorcycle', $moto->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                           View
                        </a>

                        @auth
                            <a href="{{ route('rentMotorcycle', $moto->id) }}"
                               class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 text-sm">
                               Rent
                            </a>

                            <a href="{{ route('editMotorcycle', $moto->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                               Edit
                            </a>

                            <form action="{{ route('deleteMotorcycle', $moto->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
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
