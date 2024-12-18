<x-app-layout>
    <div class="bg-white p-6 shadow-md rounded-md">
        <!-- Banner -->
        <div class="relative bg-gray-200 p-6 rounded-md">
            <img src="{{ asset('images/header.jpg') }}" alt="header" class="w-full rounded-md">
            <div class="absolute top-1/2 left-8 transform -translate-y-1/2 text-black">
                <h1 class="text-4xl font-bold">Sastore</h1>
                <p class="mb-10 ">Fashion yang nyaman dipakai untuk aktivitas Anda.</p>
                <!-- Tombol Beli Sekarang -->
                @guest
                <a href="{{ route('login') }}" class="mt-6 bg-pink-600 text-black px-6 py-2 rounded-md hover:bg-pink-500 ">Belanja Sekarang</a>
                @else
                <a href="{{ route('products.index') }}" class="mt-6 bg-pink-600 text-white px-6 py-2 rounded-md hover:bg-pink-500">Belanja Sekarang</a>
                @endguest
            </div>
        </div>

        <!-- Produk Kami -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold">Produk Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-4">
                @foreach($products as $product)
                <div class="bg-white shadow-md rounded-md p-4">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full rounded-md">
                    <h3 class="text-lg font-bold mt-2">{{ $product->name }}</h3>
                    <p class="text-gray-500 mb-4">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <!-- Tombol Beli Produk -->
                    @guest
                    <a href="{{ route('login') }}" class="mt-2 bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-500">Beli</a>
                    @else
                    <a href="{{ route('products.show', $product->id) }}" class="block mt-2 px-4 py-2 text-center bg-pink-600 text-white rounded-md hover:bg-pink-500">Lihat Detail</a>
                    @endguest
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
