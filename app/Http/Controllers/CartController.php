<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
   public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Jika user login, simpan produk ke keranjang milik user
        if (Auth::check()) {
            $userId = Auth::id();
            $existingCartItem = Cart::where('user_id', $userId)->where('product_id', $product->id)->first();

            if ($existingCartItem) {
                // Jika produk sudah ada di keranjang, tambah kuantitasnya
                $existingCartItem->increment('quantity');
            } else {
                // Jika produk belum ada, buat entri baru di keranjang
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $product->id,
                    'quantity' => 1, // Default jumlah produk 1
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
        }

        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    // Melihat isi keranjang
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('cart.index', compact('carts'));
    }

    // Mengupdate jumlah produk di keranjang
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui');
    }

    // Menghapus produk dari keranjang
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
