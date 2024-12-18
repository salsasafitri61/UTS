<x-app-layout>
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari produk..." 
                    class="px-4 py-2 border rounded-l-md focus:border-pink-500 focus:ring-pink-500">
                <button type="submit" class="px-4 py-2 bg-pink-600 text-white rounded-r-md hover:bg-pink-500">
                    Cari
                </button>
            </form>
        </div>
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('products.create') }}"
                       class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-500">
                        Tambah Produk
                    </a>
                @endif
            @endauth
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                @if (auth()->user()->role === 'admin' || !$product->trashed())
                    <div class="bg-white p-4 shadow-md rounded-lg hover:shadow-lg transition-shadow">
                        <img src="{{ $product->image ? Storage::url($product->image) : 'https://via.placeholder.com/150' }}" 
                             alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-md mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $product->name }}
                            @if($product->trashed())
                                <span class="text-sm text-red-500">(Dihapus)</span>
                            @endif
                        </h2>
                        <p class="text-gray-500 text-sm">Rp {{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-400 text-xs">{{ $product->category }}</p>
                        <p class="text-gray-500 text-sm"><strong>Stok:</strong> {{ $product->stock }}</p> <!-- Menampilkan stok -->
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <div class="mt-4 flex space-x-2">
                                    @if(!$product->trashed())
                                        <a href="{{ route('products.edit', $product->id) }}"
                                           class="px-2 py-1 bg-pink-600 text-white rounded hover:bg-pink-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-2 py-1 bg-pink-600 text-white rounded hover:bg-pink-500">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('products.restore', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                    class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-500">
                                                Restore
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                <div class="mt-4">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-500">
                                        Lihat Detail
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Navigasi Pagination -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
