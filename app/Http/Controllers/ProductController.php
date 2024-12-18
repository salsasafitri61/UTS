<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
 public function index(Request $request)
{
    $query = Product::query()->withTrashed();

    // Filter berdasarkan pencarian
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%")
              ->orWhere('category', 'LIKE', "%$search%");
        });
    }

    // Filter produk yang stoknya lebih dari 0
    if (auth()->user()->role !== 'admin') {
        $query->where('stock', '>', 0); // Admin tetap bisa melihat semua produk
    }

    $products = $query->orderBy('created_at', 'desc')->paginate(12);
    return view('products.index', compact('products'));
}


     public function create()
    {
        return view('products.create');  // Menampilkan view 'products.create'
    }
     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // Validasi gambar
            'stock' => 'required|integer|min:0',  // Validasi stok
        ]);

        // Menyimpan produk ke database
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->category = $validated['category'];
        $product->stock = $validated['stock'];

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 's3');
            $product->image = $imagePath;
        }

        $product->save();  // Menyimpan produk ke dalam database

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Fungsi untuk menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Fungsi untuk mengupdate produk
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category' => 'nullable|string',
        'stock' => 'required|integer|min:0', // Validasi stok
        'image' => 'nullable|image|max:2048', // Validasi gambar
    ]);

    $product = Product::findOrFail($id);
    $product->name = $validated['name'];
    $product->price = $validated['price'];
    $product->description = $validated['description'];
    $product->category = $validated['category'];
    $product->stock = $validated['stock'];

    // Jika ada file baru di-upload
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Upload gambar baru
        $imagePath = $request->file('image')->store('products', 's3');
        $product->image = $imagePath; // Simpan path ke database
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
}


 public function destroy($id)
{
    // Cari produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Hapus produk dengan soft delete
    $product->delete();

    // Redirect kembali ke halaman produk dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
}

public function restore($id)
{
    $product = Product::withTrashed()->findOrFail($id);  // Mengambil produk yang telah dihapus
    $product->restore();  // Mengembalikan produk

    return redirect()->route('products.index')->with('success', 'Produk berhasil dipulihkan');
}



}

