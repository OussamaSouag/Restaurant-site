<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buy : ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('products.index') }}" class="inline-block bg-[#FE043C] text-white px-4 py-2 rounded hover:bg-blue-700">
                            ← Back to Products
                        </a>
                    </div>

                    <h3 class="text-2xl font-bold mb-4 text-[#2E266F]">Buy Product: {{ $product->name }}</h3>

                    <form action="{{ route('product.buy', $product) }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text" id="name" name="name" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                            <input type="email" id="email" name="email" required
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Your Address</label>
                            <textarea id="address" name="address" required rows="3"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                         <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <input type="tel" id="phone" name="phone" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="e.g. +213661234567">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message (Optional)</label>
                            <textarea id="message" name="message" rows="2"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <div>
                            <button type="submit"
                                    class="w-full bg-[#FE043C] text-white font-semibold py-2 px-4 rounded hover:bg-yellow-600 transition duration-200">
                                Submit Purchase Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
