<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

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


}
