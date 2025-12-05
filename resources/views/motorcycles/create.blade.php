@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color: red;" class="fixed px-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="pt-[80px] h-screen flex flex-col justify-center items-center">
    <h1 class="text-2xl mb-2">Add New Motorcycle</h1>

    <form action="{{ route('storeMotorcycle') }}" method="post" enctype="multipart/form-data">
        @csrf

    <div class="max-[900px]:pl-[100px]">
        <table>
            <tr>
                <td>Brand:</td>
                <td> <select name="brand_id" class="px-3 leading-[1.5rem] my-[5px] rounded-[5px] border border-darkGray py-0" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select></td>
            </tr>

            <tr>
                <td>Model:</td>
                <td><input type="text" name="model" class="typed_input leading-[1.5rem] my-[5px] rounded-[5px] border border-darkGray py-0" required></td>
            </tr>

            <tr>
                <td>Year:</td>
                <td><input type="number" name="year" min="2000" max="{{ date('Y') }}" class="typed_input leading-[1.5rem] my-[5px] rounded-[5px] border border-darkGray py-0" required></td>
            </tr>

            <tr>
                <td>Color:</td>
                <td><input type="text" name="color" class="typed_input leading-[1.5rem] my-[5px] rounded-[5px] border border-darkGray py-0" required></td>
            </tr>

            <tr>
                <td>Price per Day (¥):</td>
                <td><input type="number" name="price_per_day" min="0" class="typed_input leading-[1.5rem] my-[5px] rounded-[5px] border border-darkGray py-0" required></td>
            </tr>

            <tr>
                <td>Motorcycle Image:</td>
                <td><input type="file" name="image" id="image"></td>
            </tr>

            <tr>
                <td>Available:</td>
                <td><input type="checkbox" name="is_available"></td>
            </tr>
        </table>
    </div>

        <button type="submit" class="btn btn-red">Save</button>
    </form>
</div>
@endsection
