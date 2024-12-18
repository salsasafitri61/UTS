<x-app-layout>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <!-- Gambar Logo -->
    <div class="flex justify-center mb-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-40 w-60">
    </div>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <!-- Form Login -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium">Username</label>
            <input id="username" name="username" type="text" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input id="password" name="password" type="password" required
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent">
        </div>

        <!-- Login Button -->
        <button type="submit"
            class="w-full bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
            Login
        </button>
    </form>
</div>
</x-app-layout>
