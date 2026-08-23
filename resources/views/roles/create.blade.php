<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                    </div>
                   <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mt-2">
                            <h3>Permissions</h3>
                            @foreach($permissions as $permission)
                            <label for=""><input type="checkbox" name="permissions[{{$permission->name }}]" value="{{$permission->name}}"> {{$permission->name }}</label><br>
                            @endforeach


                        </div>
                     
                        <button type="submit" class="btn btn-primary">Create Role</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
