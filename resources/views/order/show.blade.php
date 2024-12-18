<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-semibold mb-6">Order #{{ $order->id }}</h1>

        <div class="bg-white shadow-md rounded-md p-6">
            <h2 class="text-2xl font-semibold">Detail Pembelian</h2>
            <p><strong>Alamat Pengiriman:</strong> {{ $order->address }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>

            <h3 class="mt-6 text-xl font-semibold">Produk yang dibeli</h3>
            <table class="w-full mt-4 table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Gambar</th>
                        <th class="border px-4 py-2">Produk</th>
                        <th class="border px-4 py-2">Harga</th>
                        <th class="border px-4 py-2">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($product->pivot->price, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
