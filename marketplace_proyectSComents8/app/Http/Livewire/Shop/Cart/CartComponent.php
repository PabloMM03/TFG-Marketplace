<?php

namespace App\Http\Livewire\Shop\Cart;

use App\Models\Carrito;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    /**function which allows us to show all the data of the products of the cart of each user */
    public function render()
    {
        $cart_items = Carrito::where('user_id', Auth::id())->get();       
        return view('livewire.shop.cart.cart-component', compact('cart_items'))->extends('layouts.app')->section('content');
    }

/**Function that allows us to add products to the cart */
/**
 * This code looks for whether a record exists in the cart for the current user and the product you are trying to add. 
 * If it finds it, it increases the quantity of the existing product instead of creating a new record. Otherwise, create a new record as before.
 */

public function addProductToSingle(Request $request)
{
    $product_id = $request->input('product_id');
    $product_qty = $request->input('product_qty');

    if (Auth::check()) {
        $prod_check = Product::where('id', $product_id)->first();

        if ($prod_check) {
            $cartItem = Carrito::where('user_id', Auth::id())
                ->where('prod_id', $product_id)
                ->first();

            if ($cartItem) {
                $cartItem->prod_qty += $product_qty;
                $cartItem->save();
            } else {
                $cartItem = new Carrito();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
            }
            return response()->json(["status" => "Producto añadido al carrito"]);
        }
    } else {
        return response()->json(["status" => "Debe hacer login para continuar"]);
    }
}

    //Delete product to cart

    public function deleteProduct(Request $request){

        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                
              $cartItem = Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
              $cartItem->delete();
                return response()->json(["status" => "Producto eliminado del carrito"]);
            }
        }else{
            return redirect()->back()->with('status', 'Necesita hacer login para continuar');
        }
    }

    public function updateCart(Request $request){

        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check()){

            if(Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){

                $cart = Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();

                return response()->json(["status" => "Cantidad actualizada"]);

            }
        }else{
            return redirect()->back()->with('status', 'Necesita hacer login para continuar');
        }
    }





public function deleteAll(){
    Carrito::truncate();
    return redirect('/')->with('info', 'Carrito vaciado correctamente');
}

}
