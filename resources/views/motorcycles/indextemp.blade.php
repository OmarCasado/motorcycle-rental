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
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 bg-gray-800 max-[900px]:bg-[url('/images/o-dan/o-dan_roadline.jpg')] max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:bg-fixed">
    <header class="flex justify-between h-[70px] bg-darkGray fixed w-full z-10">
        <a href="index.html" class="flex justify-center py-0 px-2 w-6 max-w max-w-[100vw]"> <!--ロゴとブランド名を含む div 要素。-->
            <img src="/images/own/logo.png" alt="Brand Logo" class="scale-105 max-w-full h-auto hover:scale-125">
            <h1 class="text-white hover:text-greenCustom">J.<span class="text-redCustom">O</span>.2 Bike Rental</h1>
        </a>

        <nav id="top_nav"> <!--　ナヴィゲーション・バ－　-->
            <ul class="flex justify-evenly m-0 p-0">
                <li class="px-[25px] leading-[70px]"><a href="routes.html" class="text-white  hover:text-greenCustom">Routes</a></li>
                <li class="px-[25px] leading-[70px]"><a href="prices.html" class="text-white  hover:text-greenCustom">Prices</a></li>
                <li class="px-[25px] leading-[70px]"><a href="#" class="text-white  hover:text-greenCustom">Sign in</a></li>
                <li class="px-[25px] leading-[70px]"><a href="contact.html" class="text-white hover:text-greenCustom">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <section id="main" class="h-screen flex justify-center items-center text-center max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:h-screen animate-main-image"> <!--タイトル、パラグラフと背景動画を含むMain セクション。-->
        <div id="main_info" class="text-white ">
            <h2>IF THE ROAD IS YOUR GOAL</h2>
            <p class="text-sm max-[1300px]:text-base max-[1100px]:text-xs">RENT A MOTORCYCLE WITH US AND UNLOCK ALL THE HIDDEN BEAUTY OF JAPAN</p>
            <a href="#" class="block text-white bg-redCustom w-[100px] p-2 rounded-lg mx-auto my-0 hover:bg-greenCustom">RESERVE</a>
        </div>

        <div id="background_video">
            <video autoplay loop muted>
                <source src="/videos/video_moto.mp4" type="video/mp4">
            </video>
        </div>
    </section>

    <aside> <!--最新ニュースを含むアサイド。-->
        <h3>BLOG</h3>
        <ul>
            <li><a href="#"><img src="/images/o-dan/o-dan_new.jpg" alt="Yamaha's new motorcycle">
                    <p>YAMAHA'S new upcoming</p>
                </a></li>
            <li><a href="#"><img src="/images/o-dan/o-dan_solo.jpg" alt="Solo touring">
                    <p>What to pack for a touring?</p>
                </a></li>
            <li><a href="#"><img src="/images/o-dan/o-dan_police.jpg" alt="Police information">
                    <p>Police cracking down on speed</p>
                </a></li>
        </ul>
    </aside>

    <section id="new_models"> <!-- 新しいモデルを提示するセクション。各モデルは単独のarticleで構成する。-->
        <h2> RIDE OUR NEW MODELS</h2>
        <div id="article_wrapper">
            <article>
                <a href="#"><img src="/images/o-dan/o-dan_kawasaki_transparent.png" alt="Kawasaki Ninja 250"></a>
                <h3>KAWASAKI NINJA 250</h3>
                <p>Available at all shops nationwide.</p>
                <a class="reserve_button" href="#">RESERVE</a>
            </article>

            <article>
                <a href="#"><img src="/images/o-dan/o-dan_yamaha_r3_transparent.png" alt="Yamaha R3"></a>
                <h3>YAMAHA R3</h3>
                <p>Available at all shops nationwide.</p>
                <a class="reserve_button" href="#">RESERVE</a>
            </article>

            <article>
                <a href="#"><img src="/images/o-dan/o-dan_harley_livewire_transparent.png" alt="Harley Davidson Livewire"></a>
                <h3>HARLEY-DAVIDSON LIVEWIRE</h3>
                <p>At present only available in Tokio.</p>
                <a class="reserve_button" href="#">RESERVE</a>
            </article>
        </div>
    </section>

    <section id="about"> <!--ブランドのヴァリューをまとめるセクション。-->
        <h2>ABOUT US</h2>
        <div id="about_wrapper">

            <div id="about_card1">
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

            <div id="about_card2">
            </div>
        </div>
    </section>

    <footer>
        <div>
            <small>© 2023 Japan On 2 Wheels @.C.H.</small>
        </div>

        <div id="goback">
            <a href="#">
                <i class="fa-solid fa-angles-up fa-beat-fade fa-xl"></i>
            </a>
        </div>
    </footer>
</body>

</html>