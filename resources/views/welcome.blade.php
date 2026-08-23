<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
     <style>
    /* Custom styles for the animated gradient text */
    .bnv {
      position: relative;
      text-transform: uppercase;
      font-family: sans-serif;
      font-size: 30px;
      letter-spacing: 4px;
      overflow: hidden;
      background: linear-gradient(90deg, #2E266F, #FE043C, #2E266F);
      background-repeat: no-repeat;
      background-size: 80%;
      animation: animate 2s linear infinite;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent; /* use transparent instead of rgba */
      background-clip: text;
      color: transparent;
    }

    @keyframes animate {
      0% {
        background-position: -500%;
      }
      100% {
        background-position: 500%;
      }
    }
    
  </style>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18]">

    <!-- Header OVERLAY on top of content -->
    <header class="absolute top-0 left-0 w-full p-6 text-sm z-20">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-[#19140035] rounded-sm hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 text-[#1b1b18] dark:text-[#EDEDEC] border border-[#19140035] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- MAIN starts from top (header is above it) -->
    <main class="w-full min-h-screen bg-[#FFF5EC] relative z-10 -mt-28">

        <!-- Hero Section (add top padding for readability under header) -->
        <section class="pt-28 h-[calc(100vh+80px)] flex flex-row">
            <div class="h-auto w-1/2 flex flex-col justify-center pl-10 gap-5 pr-4">
                <h1 class="text-4xl text-[#2E266F] font-bold leading-relaxed">
                    <span class="border-t-2"></span>
                </h1>
                <h2  class="text-2xl text-[#2E266F] font-semibold leading-relaxed">
                    <span class="bnv">Bienvenue</span> sur le site du restaurant "Kool Bna" !
                </h2>
                <p class="text-[#2E266F]">
                    Découvrez une expérience culinaire unique où saveurs traditionnelles et modernité se rencontrent...
                </p>
                <div class="bg-[#FE043C] py-2 px-4 rounded-md w-fit">
                    <a href="{{ route('products.index') }}" class="text-[#2E266F] font-semibold hover:text-gray-500">
                        Commander maintenant
                    </a>
                </div>
            </div>
            <div class="relative h-[calc(100vh+80px)] w-full flex">
                <div class="w-1/2 bg-[#FFF5EC] h-full"></div>
                <div class="w-1/2 bg-[#FE043C] h-full"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 hover:scale-110 transition duration-150 ease-in-out">
                    <img src="{{ asset('images/plat.png') }}" alt="Dish" class="object-contain rounded-full shadow-md" />
                </div>
            </div>
        </section>

        <!-- Menu Section -->
        <section class="bg-[#FFF5EC] pt-20 pb-10">
            <h2 class="text-[#2E266F] text-center text-3xl font-bold mb-10">Rich Menu</h2>
            <div class="flex flex-row justify-center items-center gap-10 flex-wrap">
                <!-- Card 1 -->
                <div class="h-auto w-[300px] bg-white rounded-2xl shadow-lg flex flex-col items-center transition duration-150 ease-in-out hover:scale-105 p-4">
                    <img src="{{ asset('images/vecteezy_platter-of-grilled-meat-and-fresh-vegetables-for-a-sumptuous_58268623.png') }}" alt="Grilled Meat" class="h-[250px] w-[250px] object-cover rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#2E266F] mt-4">Assiette Grillade Mixte</h3>
                    <p class="text-sm text-gray-600 text-center px-4 mt-2">Un mélange savoureux de viandes grillées, servi avec légumes frais.</p>
                    <span class="text-lg font-bold text-[#FE043C] mt-2">2200 DA</span>
                    <div class="flex items-center gap-1 mt-2">
                        ⭐⭐⭐⭐⭐ <span class="text-sm text-gray-500">(92 avis)</span>
                    </div>
                    <a href="{{ route('products.index') }}" class="bg-[#FE043C] text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-200 mt-4">
                        Commander
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="h-auto w-[300px] bg-white rounded-2xl shadow-lg flex flex-col items-center transition duration-150 ease-in-out hover:scale-105 p-4">
                    <img src="{{ asset('images/—Pngtree—pizza red food_15367782.png') }}" alt="Pizza" class="h-[250px] w-[250px] object-cover rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#2E266F] mt-4">Pizza Margherita</h3>
                    <p class="text-sm text-gray-600 text-center px-4 mt-2">Tomates fraîches, mozzarella, basilic et sauce maison.</p>
                    <span class="text-lg font-bold text-[#FE043C] mt-2">1500 DA</span>
                    <div class="flex items-center gap-1 mt-2">
                        ⭐⭐⭐⭐☆ <span class="text-sm text-gray-500">(128 avis)</span>
                    </div>
                    <a href="{{ route('products.index') }}" class="bg-[#FE043C] text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-200 mt-4">
                        Commander
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="h-auto w-[300px] bg-white rounded-2xl shadow-lg flex flex-col items-center transition duration-150 ease-in-out hover:scale-105 p-4">
                    <img src="{{ asset('images/Lovepik_com-401281990-gourmet-german-dish.png') }}" alt="German Dish" class="h-[250px] w-[250px] object-cover rounded-t-2xl">
                    <h3 class="text-xl font-semibold text-[#2E266F] mt-4">Spécialité Bavaroise</h3>
                    <p class="text-sm text-gray-600 text-center px-4 mt-2">Saucisses artisanales, choucroute et pommes sautées à l’allemande.</p>
                    <span class="text-lg font-bold text-[#FE043C] mt-2">1900 DA</span>
                    <div class="flex items-center gap-1 mt-2">
                        ⭐⭐⭐⭐☆ <span class="text-sm text-gray-500">(75 avis)</span>
                    </div>
                    <a href="{{ route('products.index') }}" class="bg-[#FE043C] text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-200 mt-4">
                        Commander
                    </a>
                </div>
            </div>
        </section>

        <!-- Color Block Section -->
        <section class="min-h-screen flex flex-row flex-wrap justify-center items-center gap-10 bg-[#FFF5EC] pt-20 pb-20">
                <!-- Bloc 1 : Livraison -->
                <div class="h-[350px] w-[350px] bg-blue-500 text-white rounded-xl flex flex-col justify-center items-center p-6 text-center hover:scale-110 transition duration-150 ease-in-out">
                    <h3 class="text-2xl font-bold mb-2">Livraison Rapide</h3>
                    <p class="text-sm">Commandez et recevez votre repas chaud en moins de 30 minutes dans toute la ville.</p>
                </div>

                <!-- Bloc 2 : Avis -->
                <div class="h-[350px] w-[350px] bg-red-500 text-white rounded-xl flex flex-col justify-center items-center p-6 text-center hover:scale-110 transition duration-150 ease-in-out">
                    <p class="italic text-lg mb-2">"Des plats incroyables ! Mon restaurant préféré ❤️"</p>
                    <span class="font-semibold">– Karim T.</span>
                </div>

                <!-- Bloc 3 : Promo -->
                <div class="h-[350px] w-[350px] bg-green-500 text-white rounded-xl flex flex-col justify-center items-center p-6 text-center hover:scale-110 transition duration-150 ease-in-out">
                    <h3 class="text-3xl font-bold mb-2">-20% sur les pizzas</h3>
                    <p class="text-sm">Tous les mercredis à partir de 18h<br>Sur place ou à emporter.</p>
                </div>
            </section>
    </main>
</body>
</html>
