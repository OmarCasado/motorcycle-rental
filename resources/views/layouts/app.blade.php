<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth text-[100%]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Japan on 2 Wheels</title>

        <link rel="icon" type="image/png" sizes="16x16" href="images/own/favicon-16x16.png">
        <!-- Fonts -->
        <link href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-whiteCustom m-0 max-[900px]:bg-[url('/images/o-dan/o-dan_roadline.jpg')] max-[900px]:bg-center max-[900px]:bg-cover max-[900px]:bg-fixed">
        <!-- Page Heading -->
        <header>
            @include('layouts.navigation')
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
    </body>
</html>
