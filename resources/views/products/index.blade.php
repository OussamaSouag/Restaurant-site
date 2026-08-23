<x-app-layout>
    <div class="p-6 text-gray-900 flex flex-col lg:flex-row gap-6 mt-16 bg-[#FFF5EC]">

        <!-- Sidebar Filter -->
        <div class="w-full lg:w-1/4 bg-white p-4 rounded shadow">
            <h3 class="text-lg font-bold mb-4">Filter by Category</h3>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('products.index') }}"
                       class="text-sm {{ request('category') ? 'text-blue-500' : 'font-bold text-[#FE043C]' }}">
                        All Categories
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('products.index', ['category' => $category->id]) }}"
                           class="text-sm {{ request('category') == $category->id ? 'font-bold text-[#FE043C]' : 'text-blue-500' }}">
                            {{ $category->nom }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-full lg:w-3/4">

            <!-- Search + Create Button -->
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <form action="{{ route('products.index') }}" method="GET"
                      class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un Produit"
                           class="w-full sm:w-72 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#FE043C]">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <button type="submit"
                            class="bg-[#FE043C] text-[#2E266F] px-4 py-2 rounded-md hover:bg-red-300 transition">
                        Rechercher
                    </button>
                </form>

                @can('product-create')
                    <a href="{{ route('products.create') }}"
                       class="bg-[#FE043C] text-[#2E266F] px-4 py-2 rounded-md hover:bg-red-300 transition">
                        Create Product
                    </a>
                @endcan
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="block">
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 p-4 w-full hover:scale-105">
                                <div class="flex justify-center">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                             class="w-48 h-40 object-contain rounded-lg mb-4" />
                                    @else
                                        <div class="w-48 h-40 bg-gray-200 rounded-lg mb-4 flex items-center justify-center text-gray-500">
                                            No image
                                        </div>
                                    @endif
                                </div>
                                <div class="text-left px-2">
                                    <h3 class="text-base font-bold text-gray-800">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-400 leading-tight line-clamp-2 mb-2">
                                        {{ $product->description }}
                                    </p>
                                    <p class="text-[#FE043C] text-base font-bold text-right">
                                        {{ number_format($product->price, 2) }} DA
                                    </p>
                                </div>
                            </div>
                        </a>

                        <!-- Form Add to Cart -->
                        <form action="{{ route('cart.add') }}" method="POST" class="bg-white rounded-xl p-3 shadow-sm">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <label for="quantity_{{ $product->id }}" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <div class="flex items-center gap-2 mt-1">
                                <input type="number" id="quantity_{{ $product->id }}" name="quantity" value="1" min="1"
                                       class="w-20 border border-gray-300 rounded-md px-2 py-1">
                                <button type="submit"
                                        class="bg-[#FE043C] text-[#2E266F] px-4 py-2 rounded-md hover:bg-red-300 transition">
                                    Add to Cart
                                </button>
                            </div>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">No products found.</p>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                @if (method_exists($products, 'links'))
                    {{ $products->appends(request()->query())->links('vendor.pagination.tailwind') }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
