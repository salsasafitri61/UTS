<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="address" class="block">Alamat Pengiriman</label>
                <textarea name="address" id="address" rows="4" class="w-full p-3 border rounded-md" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="phone" class="block">Nomor Telepon</label>
                <input type="tel" name="phone" id="phone" class="w-full p-3 border rounded-md" required value="{{ old('phone') }}">
            </div>

            <div class="mb-6">
                <label for="payment_method" class="block">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" class="w-full p-3 border rounded-md" required>
                    <option value="COD">Cash On Delivery</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-pink-600 text-white px-6 py-2 rounded-md hover:bg-pink-500">Proses Pembayaran</button>
            </div>
        </form>
    </div>
</x-app-layout>
