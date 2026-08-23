<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products List') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-20 bg-[#FFF5EC]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-6">
                        <a href="{{ route('AdminPanel') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                            ← Back
                        </a>
                        <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                            + Create Product
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Image</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Price</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Description</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">User</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Category</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Created At</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Updated At</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-2">{{ $product->id }}</td>
                                    <td class="px-4 py-2">{{ $product->name }}</td>
                                    <td class="px-4 py-2">
                                        @if($product->image)
                                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="h-12 w-12 object-cover rounded">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ number_format($product->price, 2) }} DA</td>
                                    <td class="px-4 py-2">{{ Str::limit($product->description, 70) }}</td>
                                    <td class="px-4 py-2">{{ $product->user->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $product->category->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $product->created_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2">{{ $product->updated_at->format('Y-m-d') }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex flex-col sm:flex-row gap-2">
                                            <a href="{{ route('products.show', $product->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Show</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
