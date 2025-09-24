@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Motorcycle</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateMotorcycle', $motorcycle->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Brand:</label>
            <select name="brand_id" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $motorcycle->brand_id == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Model:</label>
            <input type="text" name="model" value="{{ $motorcycle->model }}" required>
        </div>

        <div>
            <label>Year:</label>
            <input type="number" name="year" value="{{ $motorcycle->year }}" min="2000" max="{{ date('Y') }}" required>
        </div>

        <div>
            <label>Color:</label>
            <input type="text" name="color" value="{{ $motorcycle->color }}" required>
        </div>

        <div>
            <label>Price per Day (¥):</label>
            <input type="number" name="price_per_day" value="{{ $motorcycle->price_per_day }}" min="0" required>
        </div>

        <div>
            <label for="image">Motorcycle Image:</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label>
                <input type="checkbox" name="is_available" {{ $motorcycle->is_available ? 'checked' : '' }}>
                Available
            </label>
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
