<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#FFF5EC]">

        <!-- Logo -->
        <div>
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 mx-auto">
            </a>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden rounded-2xl">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-[#2E266F] font-medium" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring-[#FE043C]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-[#2E266F] font-medium" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring-[#FE043C]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-[#2E266F] font-medium" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring-[#FE043C]" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#2E266F] font-medium" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-md focus:ring-[#FE043C]" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-gray-600 hover:text-[#FE043C]" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="ml-3 bg-[#FE043C] text-[#2E266F] px-5 py-2 rounded-md hover:bg-red-300 transition text-sm font-semibold">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
