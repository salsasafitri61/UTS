<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Menggunakan AuthenticatedSessionController untuk login
use App\Http\Controllers\RegisterController; // Menambahkan import RegisterController


use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman beranda
Route::get('/beranda', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AdminController::class, 'index'])->name('admin');

// Rute untuk dashboard (hanya untuk pengguna yang login)
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



// Rute untuk pengelolaan profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/products', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('products', ProductController::class)->except(['index']);
});
Route::get('keranjang/{id}', [ProductController::class, 'addToCart'])->name('keranjang');




// Rute untuk produk
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Rute untuk keranjang produk

// Memuat rute bawaan untuk otentikasi
require __DIR__.'/auth.php';


