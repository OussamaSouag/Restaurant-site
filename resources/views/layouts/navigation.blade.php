<nav x-data="{ open: false }" class="relative w-full z-50 bg-[#FFF5EC] px-6 py-3 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-14">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex gap-5 text-[#2E266F] items-center text-sm font-medium">
            @can('role-create')
            <a href="{{ route('AdminPanel') }}" class="hover:text-stone-500">Admin Panel</a>
            @endcan
            <a href="{{ route('dashboard') }}" class="hover:text-stone-500">Home</a>
            <a href="{{ route('products.index') }}" class="hover:text-stone-500">Menu</a>
            <a href="{{ route('commandes') }}" class="hover:text-stone-500">Mes Commandes</a>
            <a href="#" class="hover:text-stone-500">Support</a>

            <!-- Cart Icon -->
            @auth
            @php
                $cart = session('cart', []);
                $cartCount = array_sum(array_column($cart, 'quantity'));
            @endphp
            <a href="{{ route('cart.index') }}" class="relative hover:text-stone-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m4-9l2 9" />
                </svg>
                @if($cartCount > 0)
                <span class="absolute top-0 right-0 px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-full transform translate-x-1/2 -translate-y-1/2">
                    {{ $cartCount }}
                </span>
                @endif
            </a>
            @endauth
        </div>

        <!-- Authenticated / Guest Options -->
        @auth
        <div class="hidden md:flex items-center gap-5 text-sm">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-[#2E266F] bg-white hover:text-gray-700">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        @else
        <div class="hidden md:flex items-center gap-5 text-sm">
            <a href="{{ route('login') }}" class="text-[#2E266F] hover:text-stone-500">Login</a>
            <a href="{{ route('register') }}" class="bg-[#FE043C] px-3 py-1 rounded-md text-white">SignUp</a>
        </div>
        @endauth

        <!-- Mobile Hamburger -->
        <div class="md:hidden flex items-center">
            <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden px-4 pb-6 pt-4 bg-[#FFF5EC] w-full min-h-[300px]">
        <div class="space-y-1 text-[#2E266F] text-sm">
            <a href="{{ route('dashboard') }}" class="block hover:text-stone-500">Home</a>
            <a href="{{ route('products.index') }}" class="block hover:text-stone-500">Menu</a>
            <a href="{{ route('commandes') }}" class="block hover:text-stone-500">Commande</a>
            <a href="#" class="block hover:text-stone-500">Support</a>
        </div>

        @auth
        <div class="pt-4 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500 break-words">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="pt-4 border-t border-gray-200 space-y-2">
            <a href="{{ route('login') }}" class="block text-[#2E266F] hover:text-stone-500">Login</a>
            <a href="{{ route('register') }}" class="block text-white text-center bg-green-500 rounded-md py-1">SignUp</a>
        </div>
        @endauth
    </div>
</nav>
