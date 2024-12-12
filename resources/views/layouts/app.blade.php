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
    <nav class="bg-purple-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                    @auth
                        @if(auth()->user()->role == 'admin')
                        <a class="text-xl font-bold">Sastore</a>
                        @endif
                    @endauth

                    @guest
                    <a href="" class="text-xl font-bold">Sastore</a>
                    @endguest
            </div>
            <div>
                <ul class="flex space-x-4">
                    @auth
                        @if(auth()->user()->role == 'admin')
                        @else
                            <li><a href="/beranda" class="hover:underline">Beranda</a></li>
                        @endif
                    @endauth

                    @guest
                        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                    @endguest

                    @auth
                        <li>
                        <li><a href="{{ route('products') }}" class="hover:underline">keranjang</a></li>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="hover:underline">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        {{ $slot}}
    </main>

    <footer class="bg-purple-600 p-4 text-white mt-8">
        <div class="container mx-auto text-center">
            &copy; 2024 Sastore - All rights reserved.
        </div>
    </footer>
</body>
</html>
