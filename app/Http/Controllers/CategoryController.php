<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::with('products')->get();
    return view('categories.index', compact('categories'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
    ]);

    return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
}

}

