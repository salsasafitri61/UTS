<x-app-layout>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-40 w-60">
            </div>

            <!-- Informasi -->
            <div class="mb-4 text-sm text-gray-600 text-center">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Input Email -->
                <div class="mb-4">
                    <label for="email" class="block font-medium mb-2">Email</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500">
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-center">
                    <button type="submit" 
                            class="px-4 py-2 bg-pink-600 text-white font-semibold rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</x-app-layout>
