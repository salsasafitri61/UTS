<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function index()
{
    // Admin: Show all orders (including soft-deleted orders) with pagination
    if (auth()->user()->role === 'admin') {
            $orders = Order::withTrashed()->with(['products', 'user'])->orderBy('created_at', 'desc')->paginate(10);
        
    } else {
        // Customer: Show only orders that belong to the logged-in user with pagination
        $orders = auth()->user()->orders()->withTrashed()->with(['products','user'])->orderBy('created_at', 'desc')->paginate(10);
    }
 

    return view('order.index', compact('orders'));
    
}


    public function show(Order $order)
    {
        // Only allow the customer to view their own order
        if ($order->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('order.show', compact('order'));
    }
}
