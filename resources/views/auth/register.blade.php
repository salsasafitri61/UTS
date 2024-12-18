<x-app-layout>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <!-- Gambar Logo -->
    <div class="flex justify-center mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-40 w-60">
    </div>

    <!-- Pesan Error -->
    @if (session('error'))
        <div class="alert alert-danger mb-4 p-4 rounded-md bg-red-100 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Register -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input id="username" name="username" type="text" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
                <option value="customer" selected>Customer</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Register
        </button>
    </form>
</div>
</x-app-layout>
