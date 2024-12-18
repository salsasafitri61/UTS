<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6 text-center">Keranjang Belanja</h1>

        @if ($carts->isEmpty())
            <p class="text-center text-lg">Keranjang Anda kosong.</p>
        @else
            <div class="overflow-x-auto bg-white rounded-lg shadow-md p-4">
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2 text-left">Produk</th>
                            <th class="px-4 py-2 text-left">Harga</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Total</th>
                            <th class="px-4 py-2 text-left">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 flex items-center">
                                    <img src="{{ Storage::url($cart->product->image) }}" alt="{{ $cart->product->name }}" class="w-16 h-16 object-cover rounded-md mr-4">
                                    <span>{{ $cart->product->name }}</span>
                                </td>
                                <td class="px-4 py-2">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="w-20 text-center border rounded-md p-1">
                                        <button type="submit" class="bg-pink-600 text-white px-3 py-1 rounded-md hover:bg-pink-500 transition">Update</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2">Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-end">
                <div class="bg-white p-4 rounded-md shadow-md w-1/3 ">
                    <h3 class="text-xl font-bold ">Total Belanja</h3> 
                        <span class="font-semibold text-xl ">
                            Rp {{ number_format($carts->sum(fn($cart) => $cart->product->price * $cart->quantity), 0, ',', '.') }}
                        </span>
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('checkout.index') }}" class="w-full text-center bg-pink-600 text-white py-2 rounded-md hover:bg-pink-500 transition">Lanjutkan Pembayaran</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
