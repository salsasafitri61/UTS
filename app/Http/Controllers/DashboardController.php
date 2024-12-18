<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        // Penjualan hari ini
        $salesToday = Order::whereDate('created_at', now()->toDateString())->count();

        // User baru hari ini
        $newUsersToday = User::whereDate('created_at', now()->toDateString())->count();

        // Total semua pendapatan
        $totalRevenue = Order::sum('total_amount'); // Ganti sesuai nama kolom total pendapatan Anda

        // Total kategori
        $totalCategories = Category::count();

        // Data grafik sales cart
        $salesChart = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->groupBy('date')
            ->get();

        return view('dashboard', compact('salesToday', 'newUsersToday', 'totalRevenue', 'totalCategories', 'salesChart'));
    }
}
