<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Menggunakan AuthenticatedSessionController untuk login
use App\Http\Controllers\RegisterController; // Menambahkan import RegisterControlle
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    
    // Menggunakan resource route untuk produk
    Route::resource('products', ProductController::class);

    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    // Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');


Route::middleware('auth')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');
});

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::put('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');


});

// Rute untuk produk individual (melihat produk berdasarkan ID)
Route::get('keranjang/{id}', [ProductController::class, 'addToCart'])->name('keranjang');

// Memuat rute bawaan untuk otentikasi
require __DIR__.'/auth.php';
