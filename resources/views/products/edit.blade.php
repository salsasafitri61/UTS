<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Edit Produk</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="mb-4">
                    <label for="name" class="block font-semibold text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500" value="{{ old('name', $product->name) }}" required>
                </div>

                <!-- Harga Produk -->
                <div class="mb-4">
                    <label for="price" class="block font-semibold text-gray-700 mb-2">Harga</label>
                    <input type="number" id="price" name="price" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500" value="{{ old('price', $product->price) }}" required>
                </div>

                <!-- Deskripsi Produk -->
                <div class="mb-4">
                    <label for="description" class="block font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Kategori Produk -->
                <div class="mb-4">
                    <label for="category" class="block font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" id="category" name="category" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500" value="{{ old('category', $product->category) }}" required>
                </div>

                <!-- Stok Produk -->
                <div class="mb-4">
                    <label for="stock" class="block font-semibold text-gray-700 mb-2">Stok</label>
                    <input type="number" id="stock" name="stock" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500" value="{{ old('stock', $product->stock) }}" required>
                </div>

                <!-- Gambar Produk -->
                <div class="mb-4">
                    <label for="image" class="block font-semibold text-gray-700 mb-2">Gambar Produk</label>
                    <input type="file" id="image" name="image" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-pink-500">
                    @if ($product->image)
                        <div class="mt-4 text-center">
                            <img src="{{ Storage::url($product->image)}}" alt="Gambar Produk" class="w-32 h-32 object-cover rounded-md mx-auto shadow-md">
                        </div>
                    @endif
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('products.index') }}" class="mr-4 px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-500">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-500 transition duration-300">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
