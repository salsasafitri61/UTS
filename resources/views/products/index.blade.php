<x-app-layout>
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('products.create') }}"
                       class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Tambah Produk
                    </a>
                @endif
            @endauth
        </div>

        @auth
            <!-- Tampilkan produk dalam kartu untuk semua pengguna -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white p-4 shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <img src="{{ $product->image ? Storage::url($product->image) : 'https://via.placeholder.com/150' }}" 
                             alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-md mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm">Rp {{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-400 text-xs">{{ $product->category }}</p>

                        <!-- Tampilkan tombol sesuai dengan role pengguna -->
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="px-2 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @else
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="block mt-2 px-4 py-2 text-center bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    Lihat Detail
                                </a>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        @else
            <!-- Informasi untuk Pengguna yang Tidak Login -->
            <p class="text-gray-500">Silakan login untuk melihat daftar produk.</p>
        @endauth
    </div>
</x-app-layout>
