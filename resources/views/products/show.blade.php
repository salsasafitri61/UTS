<x-app-layout>
    <div class="flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Detail Produk</h1>

            <div class="flex flex-col items-center mb-6">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover rounded-md mb-4 shadow-md">
                <h2 class="text-2xl font-bold text-center text-gray-900">{{ $product->name }}</h2>
                <p class="text-gray-700 mt-4 text-center">{{ $product->description }}</p>
                <p class="text-gray-800 mt-4 font-bold text-center">Harga: <span class="font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
                <p class="text-gray-800 mt-4 font-bold">Kategori: <span class="font-semibold">{{ $product->category }}</span></p>
            </div>
            <div class="mt-6 flex justify-center space-x-4 mb-6">
                @if(auth()->user() && auth()->user()->role == 'customer')
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block px-6 py-3 bg-pink-600 text-white rounded-md hover:bg-pink-500  transition-all duration-300 shadow-md">
                            Tambah ke Keranjang
                        </button>
                    </form>
                @else
                    <a href="{{ route('products.edit', $product->id) }}" class="inline-block px-6 py-3 bg-pink-600 text-white rounded-md hover:bg-pink-500 transition-all duration-300 shadow-md">
                        Edit Produk
                    </a>
                @endif

                <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-pink-600 text-white rounded-md hover:bg-pink-500 transition-all duration-300 shadow-md">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
