<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class SalesController extends Controller
{

     public function index()
     {
         $userId = auth()->id();
         $products = Product::whereHas('transactions')->with('transactions.user')->paginate(2);

     return view('admin.sales.index', compact('products'));
     }


}
