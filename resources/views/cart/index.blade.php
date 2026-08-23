<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 mt-5 bg-[#FFF5EC]">
        <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Image</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Product</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Quantity</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Price</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Subtotal</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr class="border-b">
                            <td class="py-3 px-4">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-contain rounded">
                                @else
                                    <div class="w-20 h-20 bg-gray-200 flex items-center justify-center text-gray-500 rounded">No image</div>
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $item['name'] }}</td>
                            <td class="py-3 px-4">{{ $item['quantity'] }}</td>
                            <td class="py-3 px-4">{{ number_format($item['price'], 2) }}DA</td>
                            <td class="py-3 px-4">{{ number_format($item['price'] * $item['quantity'], 2) }}DA </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-100 font-bold">
                        <td colspan="4" class="text-right py-3 px-4">Total</td>
                        <td colspan="2" class="py-3 px-4">${{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        @else
            <p class="text-gray-500">Your cart is empty.</p>
        @endif
    </div>
</x-app-layout>
