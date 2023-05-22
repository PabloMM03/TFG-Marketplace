<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
/**
 * obtain the sale of the products that users have bought and who has done so
 */
     public function index()
     {
         $userId = auth()->id();
         $products = Product::whereHas('transactions')->with('transactions.user')->paginate(2);

     return view('admin.sales.index', compact('products'));
     }

      /**
     * Gets the details of orders placed by the authenticated user
     */
    public function view($id)
    {

        $orders = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('admin.sales.view', compact('orders'));
    }

}
