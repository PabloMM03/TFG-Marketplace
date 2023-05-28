<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Shows authenticated seller sales
     * 
     */
    public function index()
    {
        
        $userId = Auth::id();
        $products = Product::where('user_id', $userId)->whereHas('transactions')->with('transactions.user')->paginate(10);
        return view('admin.sales.index', compact('products'));
    }

    /**
     * Displays the details of an order
     */
    public function view($id)
    {
        //  Get the order details with the ID provided
        $order = Order::findOrFail($id);

        // Get the products associated with the order
        $products = Product::whereIn('id', $order->orderitems->pluck('product_id'))->get();
        return view('admin.sales.view', compact('order', 'products'));
    }
}
