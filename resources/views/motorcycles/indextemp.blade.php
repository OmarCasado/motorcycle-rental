<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <meta name="description" content="これは HTMLCSS の課題作品です。">
    <title>Japan on 2 Wheels</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="images/own/favicon-16x16.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 bg-gray-800 max-[900px]:bg-[url('/images/o-dan/o-dan_roadline.jpg')] max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:bg-fixed">
    <header class="flex justify-between h-[70px] bg-darkGray fixed w-full z-10 max-[900px]:bg-transparent max-[900px]:flex max-[900px]:justify-center max-[900px]:content-center max-[900px]:flex-col max-[900px]:absolute">
        <a href="index.html" class="flex px-[10px] w-[26rem] max-w-[100vw] justify-center"> <!--ロゴとブランド名を含む div 要素。-->
            <img src="/images/own/logo.png" alt="Brand Logo" class="scale-105 max-w-full h-auto hover:scale-125 max-[960px]:scale-75 max-[900px]:filter-none max-[900px]:w-[25%] max-[900px]:h-auto max-[900px]:scale-[0.7]">
            <h1 class="text-white hover:text-greenCustom text-2xl leading-[70px] max-[900px]:text-darkGray max-[900px]:text-[1.8rem]">J.<span class="text-redCustom">O</span>.2 Bike Rental</h1>
        </a>

        <!--　ナヴィゲーション・バ－　-->
        <nav id="top_nav">
            <ul class="flex justify-evenly m-0 p-0">
                <li class="px-[25px] leading-[70px] max-[900px]:px-[10px] max-[900px]:leading-[0]"><a href="routes.html" class="text-white  hover:text-greenCustom max-[1300px]:text-[0.9rem] max-[900px]:text-darkGray">Routes</a></li>
                <li class="px-[25px] leading-[70px] max-[900px]:px-[10px] max-[900px]:leading-[0]"><a href="prices.html" class="text-white  hover:text-greenCustom max-[1300px]:text-[0.9rem] max-[900px]:text-darkGray">Prices</a></li>
                <li class="px-[25px] leading-[70px] max-[900px]:px-[10px] max-[900px]:leading-[0]"><a href="#" class="text-white  hover:text-greenCustom max-[1300px]:text-[0.9rem] max-[900px]:text-darkGray">Sign in</a></li>
                <li class="px-[25px] leading-[70px] max-[900px]:px-[10px] max-[900px]:leading-[0]"><a href="contact.html" class="text-white hover:text-greenCustom max-[1300px]:text-[0.9rem] max-[900px]:text-darkGray">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <!--タイトル、パラグラフと背景動画を含むMain セクション。-->
    <section id="main" class="h-screen flex justify-center items-center text-center max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:h-screen max-[900px]:animate-main-image">
        <div id="main_info" class="text-white ">
            <h2 class="m-0 text-5xl">IF THE ROAD IS YOUR GOAL</h2 class="m-0 text-5xl">
            <p class="text-sm max-[1300px]:text-base max-[1100px]:text-xs">RENT A MOTORCYCLE WITH US AND UNLOCK ALL THE HIDDEN BEAUTY OF JAPAN</p>
            <a href="#" class="block text-white bg-redCustom w-[100px] p-2 rounded-lg mx-auto my-0 hover:bg-greenCustom">RESERVE</a>
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
            <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_new.jpg" alt="Yamaha's new motorcycle" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_var(--darkGrey)] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                    <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">YAMAHA'S new upcoming</p>
                </a></li>
            <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_solo.jpg" alt="Solo touring" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_var(--darkGrey)] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                    <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">What to pack for a touring?</p>
                </a></li>
            <li class="relative mb-[10px]"><a href="#" class="flex justify-center items-center"><img src="/images/o-dan/o-dan_police.jpg" alt="Police information" class="w-full filter saturate-0 hover:shadow[3px_3px_3px_var(--darkGrey)] hover:saturate-100 hover:z-30 hover:border-2 hover:border-greenCustom transition duration-100">
                    <p class="absolute text-white bg-greenCustom z-20 m-0 bottom-0 left-0 w-full p-[1%]">Police cracking down on speed</p>
                </a></li>
        </ul>
    </aside>

    <!-- 新しいモデルを提示するセクション。各モデルは単独のarticleで構成する。-->
    <section id="new_models" class="text-center bg-darkGray text-white h-screen max-[900px]:h-auto max-[900px]:pb-12">
        <h2 class="m-0 text-5xl pt-12 mb-12"> RIDE OUR NEW MODELS</h2>
        <div id="article_wrapper" class="flex justify-center max-[900px]:flex-col max-[900px]:justify-center max-[900px]:items-center ">
            <article class="border border-lightGray rounded-[25px] mx-[30px] w-[350px] h-[420px] relative flex flex-col justify-center items-center bg-gradient-to-b from-lightGray to-darkGray max-[900px]:mb-[20px]">
                <a href="#"><img src="/images/o-dan/o-dan_kawasaki_transparent.png" alt="Kawasaki Ninja 250" class="w-[370px] hover:scale-125 transition"></a>
                <h3 class="text-left ml-[10px] mb-[10px]">KAWASAKI NINJA 250</h3>
                <p class="m-0">Available at all shops nationwide.</p>
                <a href="#" class="block no-underline text-whiteCustom bg-redCustom w-[100px] p-[10px] rounded-[10px] my-[10px] mx-auto hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">RESERVE</a>
            </article>

            <article class="border border-lightGray rounded-[25px] mx-[30px] w-[350px] h-[420px] relative flex flex-col justify-center items-center bg-gradient-to-b from-lightGray to-darkGray max-[900px]:mb-[20px]">
                <a href="#"><img src="/images/o-dan/o-dan_yamaha_r3_transparent.png" alt="Yamaha R3" class="w-[370px] hover:scale-125 transition"></a>
                <h3 class="text-left ml-[10px] mb-[10px]">YAMAHA R3</h3>
                <p class="m-0">Available at all shops nationwide.</p>
                <a href="#" class="block no-underline text-whiteCustom bg-redCustom w-[100px] p-[10px] rounded-[10px] my-[10px] mx-auto hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">RESERVE</a>
            </article>

            <article class="border border-lightGray rounded-[25px] mx-[30px] w-[350px] h-[420px] relative flex flex-col justify-center items-center bg-gradient-to-b from-lightGray to-darkGray max-[900px]:mb-[20px]">
                <a href="#"><img src="/images/o-dan/o-dan_harley_livewire_transparent.png" alt="Harley Davidson Livewire" class="w-[370px] hover:scale-125 transition"></a>
                <h3 class="text-left ml-[10px] mb-[10px]">HARLEY-DAVIDSON LIVEWIRE</h3>
                <p class="m-0">At present only available in Tokio.</p>
                <a href="#" class="block no-underline text-whiteCustom bg-redCustom w-[100px] p-[10px] rounded-[10px] my-[10px] mx-auto hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">RESERVE</a>
            </article>
        </div>
    </section>

    <!--ブランドのヴァリューをまとめるセクション。-->
    <section id="about">
        <h2 class="m-0 text-5xl text-white pt-24 text-center pb-5">ABOUT US</h2>
        <div id="about_wrapper" class="flex justify-evenly items-center h-screen w-[90%] text-white my-0 mx-auto max-[900px]:flex-col max-[900px]:h-auto">

            <div id="about_card1" class="w-[35%] h-[70%] overflow-auto bg-darkGray rounded-[10px] shadow-[5px_5px_6px_rgb(124,130,138)] border border-darkGray text-left p-[10px] mb-[20px]">
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

            <div id="about_card2" class="w-[60%] h-[550px] rounded-[10px] shadow-[5px_5px_6px_var(--light-gray)] border border-darkGray animate-about-image" >
            </div>
        </div>
    </section>

    <footer class="flex justify-between items-center bg-darkGray h-[70px]">
        <div>
            <small class="ml-5 text-white">© 2023 Japan On 2 Wheels @.C.H.</small>
        </div>

        <div id="goback" class="w-[50px] h-[50px] leading-[50px] text-center bg-redCustom rounded-[30px] mr-[20px] hover:bg-greenCustom hover:shadow-[inset_3px_3px_5px_rgb(56,58,59)] transition duration-200 ease-in">
            <a href="#">
                <i class="fa-solid fa-angles-up fa-beat-fade fa-xl text-white"></i>
            </a>
        </div>
    </footer>
</body>

</html>