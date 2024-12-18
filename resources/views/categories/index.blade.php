<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex items-center space-x-2">
                <label for="name" class="font-medium text-gray-700">Nama Kategori</label>
                <input type="text" id="name" name="name" required
                       class="px-4 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-pink-500 flex-1">
                <button type="submit"
                        class="px-4 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-500">
                    Tambah Kategori
                </button>
            </div>
        </form>

        @foreach($categories as $category)
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $category->name }}</h2>
                <ul>
                    @foreach($category->products as $product)
                        <li class="text-gray-600 text-sm">
                            {{ $product->name }} - Rp {{ number_format($product->price, 2) }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>
