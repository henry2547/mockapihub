<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <div class="w-full max-w-6xl bg-white shadow-md rounded-xl p-6" x-data="{ viewUser: null, editUser: null, deleteUser: null }">
        {{-- Heading --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
            <a href="{{ route('users.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Create User
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full border-collapse bg-white text-sm text-left text-gray-600">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->status }}</td>
                            <td class="px-6 py-4 flex justify-center space-x-3">
                                <button @click="viewUser = {{ $user->id }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">View</button>

                                <button @click="editUser = {{ $user->id }}"
                                    class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</button>

                                <button @click="deleteUser = {{ $user->id }}"
                                    class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                            </td>
                        </tr>

                        {{-- View Modal --}}
                        <div x-show="viewUser === {{ $user->id }}"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                            x-transition>
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                                <h2 class="text-xl font-bold mb-4">User Details</h2>
                                <p><strong>ID:</strong> {{ $user->id }}</p>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Status:</strong> {{ $user->status }}</p>
                                <div class="mt-6 flex justify-end">
                                    <button @click="viewUser = null"
                                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Close</button>
                                </div>
                            </div>
                        </div>

                        {{-- Edit Modal --}}
                        <div x-show="editUser === {{ $user->id }}"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                            x-transition>
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                                <h2 class="text-xl font-bold mb-4">Edit User</h2>
                                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status"
                                            class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300">
                                            <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="flex justify-end space-x-2 mt-4">
                                        <button type="button" @click="editUser = null"
                                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- Delete Modal --}}
                        <div x-show="deleteUser === {{ $user->id }}"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                            x-transition>
                            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                                <h2 class="text-xl font-bold mb-4 text-red-600">Delete User</h2>
                                <p>Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                                <div class="mt-6 flex justify-end space-x-2">
                                    <button @click="deleteUser = null"
                                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

    <div class="mt-6">
        <a href="{{ route('welcome') }}"
            class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
            Home
        </a>
    </div>

    {{-- button to view JSON data --}}
    <div class="mt-4">
        <a href="/api/json/users" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            View JSON Data
        </a>
    </div>

</body>

</html>
