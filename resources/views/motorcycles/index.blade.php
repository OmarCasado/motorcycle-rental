
@extends('layouts.app')

@section('content')
@section('body-bg', "max-[900px]:bg-[url('/images/o-dan/o-dan_roadline.jpg')] max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:bg-fixed")

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!--タイトル、パラグラフと背景動画を含むMain セクション。-->
<section id="main" class="h-screen flex justify-center items-center text-center max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:h-screen">
    <div id="main_info" class="text-white max-[900px]:absolute max-[900px]:block max-[900px]:bg-lightTransparentWhite max-[900px]:m-5 max-[900px]:p-2.5 max-[900px]:rounded-[20px]">
        <h2 class="m-0 text-5xl [text-shadow:2px_2px_2px_rgb(56,58,59)] max-[900px]:text-darkGray max-[900px]:text-2xl">IF THE ROAD IS YOUR GOAL</h2 class="m-0 text-5xl">
        <p class="text-sm m-3 max-[1300px]:text-base max-[1100px]:text-xs max-[900px]:text-darkGray">RENT A MOTORCYCLE WITH US AND UNLOCK ALL THE HIDDEN BEAUTY OF JAPAN</p>
        <a href="#" class="btn btn-red">Reserve</a>
    </div>
    <div id="background_video" class="fixed -z-10 w-full h-full max-[900px]:hidden">
        <video autoplay loop muted class="w-full">
            <source src="/videos/video_moto.mp4" type="video/mp4">
        </video>
    </div>
</section>
<!--最新ニュースを含むアサイド。-->
<aside class="flex flex-col justify-center w-[20%] absolute top-[150px] bg-white/50 p-2 ml-[10px] text-center rounded-[50px] max-[900px]:relative max-[900px]:w-full max-[900px]:p-[10px] max-[900px]:m-0 max-[900px]:-top-[10px] max-[900px]:-z-10 max-[900px]:bg-[url('/images/o-dan/o-dan_roadline.jpg')] max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:bg-fixed">
    <h3 class="m-0 p-0 max-[900px]:p-[25px] max-[900px]:text-2xl max-[900px]:text-white">BLOG</h3>
    <ul class="m-0 p-2">
        <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_new.jpg" alt="Yamaha's new motorcycle" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_darkGray] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">YAMAHA'S new upcoming</p>
            </a></li>
        <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_solo.jpg" alt="Solo touring" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_darkGray] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">What to pack for a touring?</p>
            </a></li>
        <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_police.jpg" alt="Police information" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_darkGray] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">Police cracking down on speed</p>
            </a></li>
    </ul>
</aside>
<!-- 新しいモデルを提示するセクション。各モデルは単独のarticleで構成する。-->
<section id="new_models" class="text-center bg-darkGray text-white h-screen max-[900px]:h-auto max-[900px]:pb-12">
    <h2 class="m-0 text-5xl pt-12 mb-12 [text-shadow:2px_2px_2px_rgb(56,58,59)] max-[900px]:text-2xl"> RIDE OUR NEW MODELS</h2>
    {{-- Cards Grid --}}
    <div class="flex justify-center gap-10 max-[900px]:flex-col max-[900px]:justify-center max-[900px]:items-center ">
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
                        <a href="{{ route('showMotorcycle', $moto->id) }}" class="btn btn-blue">View</a>
                        @auth
                            {{-- Rent --}}
                            <a href="{{ route('rentMotorcycle', $moto->id) }}"
                            class="btn btn-green">Rent</a>
                            {{-- Edit --}}
                            <a href="{{ route('editMotorcycle', $moto->id) }}"
                            class="btn btn-yellow">Edit</a>
                            {{-- Delete --}}
                            <form action="{{ route('deleteMotorcycle', $moto->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')" class="mx-auto">
                                @csrf
                                <button type="submit" class="btn btn-red">Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
        @auth
            <div class="mt-6">
                <a href="{{ route('createMotorcycle') }}"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                + Add Motorcycle
                </a>
            </div>
        @endauth
    </div>
</section>
<!--ブランドのヴァリューをまとめるセクション。-->
<section id="about">
    <h2 class="m-0 text-5xl text-white pt-24 text-center pb-5 [text-shadow:2px_2px_2px_rgb(56,58,59)] max-[900px]:text-2xl">ABOUT US</h2>
    <div id="about_wrapper" class="flex justify-evenly items-center h-screen w-[90%] text-white my-0 mx-auto max-[900px]:flex-col max-[900px]:h-auto">
        <div id="about_card1" class="w-[35%] h-[70%] overflow-auto bg-darkGray rounded-[10px] shadow-[5px_5px_6px_rgb(124,130,138)] border border-darkGray text-left p-[10px] mb-[20px] max-[900px]:w-[90%]">
            <h3>Japan On 2 Wheels</h3>
            <p>Japan is a country with an exceptional culture and landscapes that surpass imagination. Much of the
                tourism is concentrated in metropolitan areas, such as the greater Tokyo area or Osaka city, due to
                their accessibility by train, bus, and various transportation methods. However, the rural and
                untouched countryside, brimming with divine-like nature, remains undiscovered by many, including the
                Japanese people themselves.</p>
            <p> J.O.2 aims to provide you with the means (our motorcycles) to access many remote areas of these
                islands that are typically challenging to reach by other methods. This endeavor seeks to offer you
                an enhanced understanding of the exceptional nature of this country. We present a wide variety of
                rental options while organizing guided tours that originate from our main shop in Osaka. Our
                coverage extends across the entire country, from the southern Okinawa to the northern Hokkaido.
            </p>
        </div>
        <div id="about_card2" class="w-[60%] h-[550px] rounded-[10px] shadow-[5px_5px_6px_lightGray] border border-darkGray max-[900px]:w-[90%] max-[900px]:mb-[20px]"></div>
    </div>
</section>
@endsection