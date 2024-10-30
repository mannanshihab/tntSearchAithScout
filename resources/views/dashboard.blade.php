<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard') }}" method="GET" class="sm:flex sm:items-center sm:justify-between">
                        <div class="flex items-center w-full">
                            <label for="query" class="sr-only">Search</label>
                            <input 
                                type="text" 
                                name="query" 
                                id="query"
                                placeholder="Search users..." 
                                class="border border-gray-300 rounded p-2 w-full"
                                value="{{ request()->input('query') }}">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded sm:ml-4">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->id }}</td>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">{{ $user->email }}</td>
                                        <td class="border px-4 py-2">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="border px-4 py-2" colspan="4">No users found.</td>
                                    </tr>
                                @endforelse
                                    
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 py-2">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
