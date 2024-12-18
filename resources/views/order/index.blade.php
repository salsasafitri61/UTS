<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-semibold mb-6">Daftar Order</h1>

        @php
            $totalPendapatan = $orders->sum(function($order) {
                return $order->total_amount;
            });
        @endphp

        <p class="text-lg font-semibold mb-4">Total: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
        @foreach ($orders as $order)
            <div class="bg-white shadow-md rounded-md p-6 mb-4">
                <h2 class="text-xl font-semibold">
                    Order #{{ $order->id }}
                    @if($order->trashed())
                        <span class="text-red-500 text-sm ml-2">(Dihapus)</span>
                    @endif
                </h2>
                @php
                
                @endphp
                <p><strong>Nama Pembeli:</strong> {{ $order->user ? $order->user->username : 'Pengguna Tidak Ditemukan' }}</p>
                <p><strong>Alamat Pengiriman:</strong> {{ $order->address }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                <p><strong>Total Pembayaran:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>

                <h3 class="mt-4 text-lg font-semibold">Produk yang Dibeli</h3>
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
                                    <img src="{{ Storage::url($product->image)}}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md">
                                </td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2">{{ $product->pivot->quantity }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
