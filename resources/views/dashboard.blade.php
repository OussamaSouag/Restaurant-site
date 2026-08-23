<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

 <main class="w-full h-[calc(100vh+80px)] bg-[#FFF5EC] -mt-20">
        <!-- Hero Section -->
        <section class="h-[calc(100vh+80px)] flex flex-row pt-20">
            <!-- Text Side -->
            <div class="h-auto w-1/2 flex flex-col content-center justify-center pl-10 gap-5 pr-4">
                <h1 class="text-4xl text-[#2E266F] text-left font-bold leading-relaxed">
                    <span class="border-t-2"></span>
                </h1>
                <h2 class="text-2xl text-[#2E266F] text-left font-semibold leading-relaxed">
                    Bienvenue sur le site du restaurant "Kool Bna" !
                </h2>
               <p class="text-[#2E266F] text-left hidden md:block">
                        Découvrez une expérience culinaire unique où saveurs traditionnelles et modernité se rencontrent. Chez Kool Bna, nous vous proposons une cuisine savoureuse, préparée avec des ingrédients frais et de qualité, dans une ambiance chaleureuse et conviviale. Que ce soit pour un repas en famille, entre amis ou une pause gourmande, notre équipe est là pour vous accueillir et vous offrir le meilleur.
                        Parcourez notre menu, explorez nos spécialités et réservez votre table dès maintenant !
                    </p>

                    <!-- Mobile Description (short) -->
                    <p class="text-[#2E266F] text-left block md:hidden">
                        Une cuisine savoureuse dans une ambiance chaleureuse. Réservez votre table chez Kool Bna dès maintenant !
                    </p>
                        <div class="bg-[#FE043C] py-2 px-4 rounded-md w-fit">
                    <a href="{{ route('products.index') }}" class="text-[#2E266F] font-semibold hover:text-gray-500">Commander maintenant</a>
                </div>
            </div>

            <!-- Image Side -->
            <div class="relative h-[calc(100vh+80px)] w-full flex">
                <div class="w-1/2 bg-[#FFF5EC] h-full"></div>
                <div class="w-1/2 bg-[#FE043C] h-full"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 hover:scale-110 transition duration-150 ease-in-out -mt-3">
                    <img src="{{ asset('images/plat.png') }}" alt="Dish" class="object-contain rounded-full shadow-md" />
                </div>
            </div>
        </section>

        <!-- Menu Section -->
        <section class="bg-[#FFF5EC] pt-20 pb-10">
            <h2 class="text-[#2E266F] text-center text-3xl font-bold mb-10">Rich Menu</h2>
            <div class="flex flex-row justify-center items-center gap-10 flex-wrap">
                @foreach ([
                    'vecteezy_platter-of-grilled-meat-and-fresh-vegetables-for-a-sumptuous_58268623.webp',
                    '—Pngtree—pizza red food_15367782.webp',
                    'Lovepik_com-401281990-gourmet-german-dish.png'
                ] as $image)
                    <div class="h-[400px] w-[300px] bg-white rounded-2xl shadow-lg flex flex-col items-center transition duration-150 ease-in-out hover:scale-105">
                        <img src="{{ asset('images/' . $image) }}" alt="Dish" class="h-[250px] w-[250px] object-cover rounded-t-2xl mt-4">
                        <div class="mt-4">
                            <a href="{{ route('products.index') }}" class="bg-[#FE043C] text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-200">
                                Order Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Colored Boxes Section -->
       <section class="min-h-screen flex flex-wrap bg-[#FFF5EC] justify-center items-center gap-6 pt-20 px-4">
    <!-- Card 1 -->
    <div class="h-[260px] w-[260px] bg-blue-500 text-white rounded-xl p-6 shadow-lg transition hover:scale-105 duration-150 flex flex-col justify-center items-center text-center">
        <div class="text-4xl mb-2">👨‍🍳</div>
        <h3 class="text-xl font-bold mb-1">Cuisine Authentique</h3>
        <p class="text-sm">Des plats inspirés de traditions locales et revisités avec finesse.</p>
    </div>

    <!-- Card 2 -->
    <div class="h-[260px] w-[260px] bg-red-500 text-white rounded-xl p-6 shadow-lg transition hover:scale-105 duration-150 flex flex-col justify-center items-center text-center">
        <div class="text-4xl mb-2">🍽️</div>
        <h3 class="text-xl font-bold mb-1">Service Convivial</h3>
        <p class="text-sm">Une équipe chaleureuse pour vous offrir un moment inoubliable.</p>
    </div>

    <!-- Card 3 -->
    <div class="h-[260px] w-[260px] bg-green-500 text-white rounded-xl p-6 shadow-lg transition hover:scale-105 duration-150 flex flex-col justify-center items-center text-center">
        <div class="text-4xl mb-2">🌿</div>
        <h3 class="text-xl font-bold mb-1">Produits Frais</h3>
        <p class="text-sm">Nous utilisons des ingrédients locaux et de saison pour chaque plat.</p>
    </div>
</section>
    </main>
</x-app-layout>
