<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit Produk</h1>

        <div class="bg-gray-50 rounded-lg p-6">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Nama Produk')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-gray-400 focus:border-gray-400" value="{{ old('name', $product->name) }}" required />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Harga Produk -->
                <div class="mb-6">
                    <x-input-label for="price" :value="__('Harga')" />
                    <x-text-input id="price" name="price" type="number" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-gray-400 focus:border-gray-400" value="{{ old('price', $product->price) }}" required />
                    <x-input-error :messages="$errors->get('price')" />
                </div>

                <!-- Deskripsi Produk -->
                <div class="mb-6">
                    <x-input-label for="description" :value="__('Deskripsi')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-gray-400 focus:border-gray-400" value="{{ old('description', $product->description) }}" required />
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <!-- Kategori Produk -->
                <div class="mb-6">
                    <x-input-label for="category" :value="__('Kategori')" />
                    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-gray-400 focus:border-gray-400" value="{{ old('category', $product->category) }}" required />
                    <x-input-error :messages="$errors->get('category')" />
                </div>

                <!-- Gambar Produk -->
                <div class="mb-6">
                    <x-input-label for="image" :value="__('Gambar Produk')" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring-gray-400 focus:border-gray-400" accept="image/*" />
                    <x-input-error :messages="$errors->get('image')" />
                    <div class="mt-4 text-center">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-md mx-auto">
                    </div>
                </div>

                <!-- Tombol Submit dan Batal -->
                <div class="mt-8 flex justify-center space-x-4">
                    <x-primary-button class="px-6 py-3 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition-all duration-300">
                        {{ __('Update Produk') }}
                    </x-primary-button>
                    <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-gray-400 text-gray-700 rounded-md hover:bg-gray-500 transition-all duration-300">
                        {{ __('Batal') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
