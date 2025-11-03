@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <section id="prices_contact_main" class="z-10 pt-[80px] flex flex-col justify-center items-center text-center mb-[125px] bg-[url('/images/own/road3.png')] bg-center bg-cover"> <!--タイトル、パラグラフと背景動画を含むMain セクション。-->
        <div id="prices_contact_info" class="mt-[200px]">
            <h2 class="m-0 text-[3rem] [text-shadow:2px_2px_2px_rgb(56,58,59)]">GET IN TOUCH</h2>
            <p class="mb-[50px]">LET US HEAR FROM YOU</p>
        </div>
    </section>

    <section id="contact_section" class="flex justify-between mb-[50px] max-[900px]:flex-col max-[900px]:items-center max-[900px]:justify-center">

        <form action="#" method="post" class="flex flex-col justify-center items-center border border-darkGray w-[40%] mx-auto p-[10px] rounded-[25px] shadow-[5px_5px_6px_rgb(124,130,138)] max-[900px]:w-[80%] max-[900px]:mb-[50px]">

            <div id="input_wrapper_1" class="flex flex-col justify-center items-left w-[90%]">
                <label for="name" class="mb-[10px]">Name:</label>
                <input name="name" type="text" id="name" class="typed_input leading-[1.5rem] mb-[10px] rounded-[5px] border border-darkGray py-0" placeholder="My name" required>
            </div>

            <div id="input_wrapper_2" class="flex flex-col justify-center items-left w-[90%]">
                <label for="email" class="mb-[10px]">Email:</label>
                <input name="email" type="text" id="email" class="typed_input leading-[1.5rem] mb-[10px] rounded-[5px] border border-darkGray py-0" placeholder="email@email.com" required>
            </div>

            <div id="input_wrapper_3" class="flex flex-col justify-center items-left w-[90%]">
                <label for="age" class="mb-[10px]">Age:</label>
                <input name="age" type="number" id="age" min="18" max="100" class="typed_input leading-[1.5rem] mb-[10px] rounded-[5px] border border-darkGray py-0" placeholder="18"
                    required>
            </div>

            <div id="input_wrapper_4" class="flex flex-col justify-center items-left w-[90%]">
                <label for="message" class="mb-[10px]">Your message:</label>
                <textarea name="" id="message" cols="30" rows="10" placeholder="Give us your opinion / Ask us your questions." class="resize-none px-[10px] mb-5"></textarea>
            </div>

            <input type="submit" value="Send" id="send_button" class="btn btn-red">
        </form>

        <div id="contact_notes" class="w-[40%] max-[900px]:w-[80%]">

            <h3 class="mb-3 text-lg">OSAKA MAIN SHOP:</h3>
            <ul class="p-0">
                <li class="mb-[10px]"><em>Direction:</em><span class="font-sans"> #-#-# Osaka City, Osaka Prefecture, Japan, ###-###</span></li>
                <li class="mb-[10px]"><em>Tel:</em><span class="font-sans"> 1(012) ###-###</span></li>
                <li class="mb-[10px]"><em>Email:</em><span class="font-sans"><a href="mailto:jo2@motoservices.com" class="text-greenCustom"> 〇〇2@〇〇〇〇.com</a></span></li>
                <li class="mb-[10px]"><em>Business Hours:</em><span class="font-sans"> 8:00 to 20:00, 7 days a week</span></li>
            </ul>

            <div id="map_container" class="mb-[20px] w-[80%] h-[50%] border max-[900px]:w-[100%] max-[900px]:h-[60%]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.1066536738886!2d135.4933756754578!3d34.70248978311734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68d95e3a70b%3A0x1baec822e859c84a!2sOsaka%20Station!5e0!3m2!1sen!2sjp!4v1692627031264!5m2!1sen!2sjp"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <p>※このマップはダミーです。</p>
        </div>
    </section>
@endsection