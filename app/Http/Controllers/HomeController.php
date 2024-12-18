<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        // Filter produk dengan stok > 0
        $products = Product::where('stock', '>', 0)
                           ->orderBy('created_at', 'desc')
                           ->paginate(4);

        return view('home', compact('products'));
    }
}

