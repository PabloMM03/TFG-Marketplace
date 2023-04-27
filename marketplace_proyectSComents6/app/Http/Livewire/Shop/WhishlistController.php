<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WhishlistController extends Component
{
    public function render()
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('livewire.shop.whishlist-controller', compact('wishlist'))->extends('layouts.app')->section('content');
    }

    public function add(Request $request){
        if(auth()->check()){
            $product_id = $request->input('product_id');
            if(Product::find($product_id)){
                $wish = new Wishlist();
                $wish->prod_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();

                return redirect()->back()->with('status', "Producto añadido correctamente a su Wishlist"); 
            }else{
                return redirect()->back()->with('status', "El producto no existe"); 
            }
        }else{
            return redirect()->back()->with('status', "Necesita hacer el login para continuar"); 
        }
    }
}
