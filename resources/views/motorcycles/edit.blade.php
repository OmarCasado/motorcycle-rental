@extends('layouts.app')

@section('content')
<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Edit Motorcycle</h1>

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

    <table>
        <tr>
            <td>Brand:</td>
            <td>            <select name="brand_id" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $motorcycle->brand_id == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select></td>
        </tr>

        <tr>
            <td>Model:</td>
            <td><input type="text" name="model" value="{{ $motorcycle->model }}" required></td>
        </tr>

        <tr>
            <td>Year:</td>
            <td><input type="number" name="year" value="{{ $motorcycle->year }}" min="2000" max="{{ date('Y') }}" required></td>
        </tr>

        <tr>
            <td>Color:</td>
            <td><input type="text" name="color" value="{{ $motorcycle->color }}" required></td>
        </tr>

        <tr>
            <td>Price per Day (¥):</td>
            <td><input type="number" name="price_per_day" value="{{ $motorcycle->price_per_day }}" min="0" required></td>
        </tr>

        <tr>
            <td>Image:</td>
            <td><input type="file" name="image" id="image"></td>
        </tr>

        <tr>
            <td>Available:</td>
            <td><input type="checkbox" name="is_available" {{ $motorcycle->is_available ? 'checked' : '' }}></td>
        </tr>
    </table>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
