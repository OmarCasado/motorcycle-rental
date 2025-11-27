@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Add New Motorcycle</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('storeMotorcycle') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Brand:</label>
            <select name="brand_id" required>
                <option value="">Select Brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Model:</label>
            <input type="text" name="model" required>
        </div>

        <div>
            <label>Year:</label>
            <input type="number" name="year" min="2000" max="{{ date('Y') }}" required>
        </div>

        <div>
            <label>Color:</label>
            <input type="text" name="color" required>
        </div>

        <div>
            <label>Price per Day (¥):</label>
            <input type="number" name="price_per_day" min="0" required>
        </div>

        <div>
            <label for="image">Motorcycle Image:</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_available" checked>
                Available
            </label>
        </div>

        <button type="submit">Save</button>
    </form>
</div>
@endsection
