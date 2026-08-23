<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>
    <div class="py-12 mt-20 bg-[#FFF5EC]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('AdminPanel') }}" class="btn btn-primary">←Back</a>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
                    </div>
                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id  }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                            <td>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('users.show',$user->id) }}" class="btn btn-sm btn-info">Show</a>
                                                    <a href="{{route('users.edit',$user->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
