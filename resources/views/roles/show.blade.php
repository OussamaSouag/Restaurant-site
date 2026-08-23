<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">back</a>
                    </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                <h1><strong>Name:</strong>{{ $role->name }}</h1>
                <br>
                <h1><strong>Permissions:</strong></h1>
                <ul>
                @foreach ($role->permissions as $permission)
                   <li>{{ $permission->name }}</li>
                @endforeach 
                </ul>
                <div class="mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary">Edit Role</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
