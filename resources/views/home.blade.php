<x-app-layout>
<div class="bg-white p-6 shadow-md rounded-md">
    <!-- Banner -->
    <div class="relative bg-gray-200 p-6 rounded-md">
        <img src="{{ asset('images\header.jpg') }}" alt="header" class="w-full rounded-md">
        <div class="absolute top-1/2 left-8 transform -translate-y-1/2 text-white">
            <h1 class="text-4xl font-bold">Sastore</h1>
            <p class="mb-10">Fashion yang nyaman dipakai untuk aktivitas Anda.</p>
            <!-- Tombol Beli Sekarang -->
            @guest
            <a href="{{ route('login') }}" class="mt-6 bg-purple-400 text-black px-6 py-2 rounded-md">Belanja Sekarang</a>
            @else
            <a href="{{ route('products') }}" class="mt-6 bg-purple-400 text-black px-6 py-2 rounded-md">Belanja Sekarang</a>
            @endguest
        </div>
    </div>

    <!-- Promo Section -->
    <div class="grid grid-cols-4 gap-4 mt-8">
        <div class="bg-purple-100 p-4 rounded-md text-center">
            <p class="font-bold text-lg">Pengiriman Cepat</p>
            <p>Kurir terpercaya dan handal</p>
        </div>
        <div class="bg-purple-100 p-4 rounded-md text-center">
            <p class="font-bold text-lg">Kualitas Terjamin</p>
            <p>3 Bulan garansi produk</p>
        </div>
        <div class="bg-purple-100 p-4 rounded-md text-center">
            <p class="font-bold text-lg">Pembayaran Mudah</p>
            <p>Bisa Cash on Delivery</p>
        </div>
        <div class="bg-purple-100 p-4 rounded-md text-center">
            <p class="font-bold text-lg">Admin Bersahabat</p>
            <p>Admin ramah dan edukatif</p>
        </div>
    </div>

    <!-- Produk Kami -->
   <div class="mt-8">
    <h2 class="text-2xl font-bold">Produk Kami</h2>
    <div class="grid grid-cols-4 gap-6 mt-4">
        @foreach($products as $product)
        <div class="bg-white shadow-md rounded-md p-4">
            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-full rounded-md">
            <h3 class="text-lg font-bold mt-2">{{ $product['name'] }}</h3>
            <p class="text-gray-500 mb-4">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
            <!-- Tombol Beli Produk -->
            @guest
            <a href="{{ route('login') }}" class="mt-2 bg-purple-600 text-white px-4 py-2 rounded-md">Beli</a>
            @else
            <a href="{{ route('keranjang', ['id' => $product['id']]) }}" class="mt-2 bg-purple-600 text-white px-4 py-2 rounded-md">Beli</a>
            @endguest
        </div>
        @endforeach
    </div> 
</div> 
</x-app-layout>