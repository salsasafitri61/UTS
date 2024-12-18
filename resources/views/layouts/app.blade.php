<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sastore - Fashion Store</title>
    @vite('resources/css/app.css')
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-pink-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <!-- Logo or Site Name -->
                <a href="/" class="text-xl font-bold">Sastore</a>
            </div>

         

            <div>
            <ul class="flex space-x-4">
    @auth
        <!-- Authenticated User Menu -->
        @if(auth()->user()->role == 'admin')
            <!-- <li><a href="/dashboard" class="hover:underline">Dashboard</a></li> -->
            <li><a href="{{ route('products.index') }}" class="hover:underline">Produk</a></li>
            <li><a href="{{ route('order.index') }}" class="hover:underline">Riwayat</a></li>
            <!-- Tambahkan tautan Kategori -->
        @else
            <li><a href="/beranda" class="hover:underline">Beranda</a></li>
            <li><a href="{{ route('products.index') }}" class="hover:underline">Produk</a></li>
            <li><a href="{{ route('cart.index') }}" class="hover:underline">Keranjang</a></li>
            <li><a href="{{ route('order.index') }}" class="hover:underline">Riwayat</a></li>
        @endif
        <li>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    @endauth

    @guest
        <!-- Guest User Menu -->
        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
        <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
    @endguest
</ul>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        {{ $slot }}
    </main>

    <footer class="bg-pink-600 p-4 text-white mt-8">
        <div class="container mx-auto text-center font-bold">
            <p>10122216-SALSA SAFITRI IKLIMA-IF6</p>
        </div>
    </footer>
</body>
</html>
