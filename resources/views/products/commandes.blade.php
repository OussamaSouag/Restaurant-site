<x-app-layout>
    <div class="p-6 text-gray-900 mt-16 bg-[#FFF5EC] min-h-screen">

        <h2 class="text-2xl font-bold mb-6 text-[#2E266F]">Mes Commandes</h2>

        @forelse ($commandes as $commande)
            <div class="bg-white rounded-2xl shadow-md mb-6 p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-[#FE043C]">Commande #{{ $commande->id }}</h3>
                        <p class="text-sm text-gray-500">Date : {{ $commande->date_commande->format('d/m/Y') }}</p>
                        <p class="text-sm text-gray-600">Statut : 
                            <span class="inline-block px-2 py-1 rounded-full 
                                {{ $commande->statut === 'En_attente' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800' }}">
                                {{ ucfirst(str_replace('_', ' ', $commande->statut)) }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($commande->products as $product)
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex gap-4">
                            <div class="w-24 h-24 flex-shrink-0">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                         class="w-full h-full object-contain rounded">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                                        No image
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-md font-semibold text-gray-800">{{ $product->name }}</h4>
                                <p class="text-sm text-gray-600">Quantité : {{ $product->pivot->quantite }}</p>
                                <p class="text-sm text-[#FE043C] font-bold">{{ number_format($product->price, 2) }} DA</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center mt-20 text-gray-500">
                <p>Vous n'avez effectué aucune commande pour le moment.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
