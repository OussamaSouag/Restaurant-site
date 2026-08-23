<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2E266F] leading-tight">
            {{ __('Product Info') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-16 bg-[#FFF5EC]" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('products.index') }}"
                   class="bg-[#FE043C] text-[#2E266F] px-4 py-2 rounded-md hover:bg-red-600 transition">
                    ← Back to Products
                </a>
            </div>

            <!-- Product Card -->
            <div class="bg-white shadow-md rounded-2xl overflow-hidden p-6 sm:flex sm:items-start gap-8">
                <!-- Product Image -->
                <div class="sm:w-1/2 flex justify-center items-center mb-6 sm:mb-0">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                             class="rounded-xl shadow-md max-w-full h-auto object-contain w-72">
                    @else
                        <div class="w-72 h-60 bg-gray-200 flex items-center justify-center rounded-xl text-gray-500">
                            No image available
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="sm:w-1/2">
                    <h1 class="text-3xl font-bold text-[#2E266F] mb-4">{{ $product->name }}</h1>
                    <p class="text-2xl text-[#FE043C] font-semibold mb-4">{{ $product->price }} DA</p>
                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $product->description }}</p>

                    <!-- Buy Button -->
                    <a href="{{ route('product.buyForm', $product) }}"
                       class="inline-block bg-[#FE043C] text-[#2E266F] font-semibold px-6 py-2 rounded-md hover:bg-red-600 transition">
                        Buy Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
