<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan form checkout
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong');
        }

        $totalAmount = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('checkout.index', compact('carts', 'totalAmount'));
    }

public function processCheckout(Request $request)
{
    // Validasi data input
    $request->validate([
        'address' => 'required|string|max:255',
        'payment_method' => 'required|string|in:COD,Bank Transfer,Credit Card',
    ]);

    // Membuat order baru
    $order = Order::create([
        'user_id' => Auth::id(),
        'address' => $request->address,
        'payment_method' => $request->payment_method,
        'phone'=>$request->phone,
        'total_amount' => 0,  // Akan dihitung setelahnya
    ]);

    // Ambil semua produk yang ada di cart dan update stok
    $carts = Cart::where('user_id', Auth::id())->get();
    
    $totalAmount = 0;

    foreach ($carts as $cart) {
        // Kurangi stok produk
        $cart->product->decrement('stock', $cart->quantity);

        // Hitung total harga
        $totalAmount += $cart->product->price * $cart->quantity;

        // Relasikan order dengan cart (untuk menyimpan informasi produk yang dibeli)
        $order->products()->attach($cart->product_id, [
            'quantity' => $cart->quantity,
            'price' => $cart->product->price,
        ]);
    }

    // Update total amount pada order
    $order->update(['total_amount' => $totalAmount]);

    // Hapus cart setelah checkout
    Cart::where('user_id', Auth::id())->delete();

    // Redirect ke halaman detail order
    return redirect()->route('order.show', ['order' => $order->id]);
}

}

