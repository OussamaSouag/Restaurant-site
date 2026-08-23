<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">back</a>
                    </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                <p><strong>{{ $user->name }}</strong></p>
                <p><strong>{{ $user->email }}</strong></p>
                
                   
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
