<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commandes List') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-20 bg-[#FFF5EC]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('AdminPanel') }}" class="mb-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                        ← Back
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">User</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Produits & Prix</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Created At</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($commandes as $commande)
                                    <tr>
                                        <td class="px-4 py-2">{{ $commande->id }}</td>
                                        <td class="px-4 py-2">{{ $commande->user->name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">
                                            @foreach ($commande->products as $produit)
                                                <div>
                                                    {{ $produit->name }} — {{ number_format($produit->price, 2) }} DA
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2">
                                            <form action="{{ route('commandes.updateStatus', $commande->id) }}" method="POST" onsubmit="console.log('Form submitted');">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()" class="rounded border-gray-300">
                                                    <option value="En_attente" {{ $commande->statut == 'En_attente' ? 'selected' : '' }}>En attente</option>
                                                    <option value="En_préparation" {{ $commande->statut == 'En_préparation' ? 'selected' : '' }}>En préparation</option>
                                                    <option value="Prête" {{ $commande->statut == 'Prête' ? 'selected' : '' }}>Prête</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="px-4 py-2">{{ $commande->created_at->format('Y-m-d') }}</td>
                                        <td class="px-4 py-2">
                                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $commandes->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
