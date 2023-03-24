<?php

namespace App\Http\Livewire\Shop\Cart;

use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class IndexComponent extends Component
{
    public function render()
    {
        $cart_items = Cart::session(auth()->id())->getContent();
        return view('livewire.shop.cart.index-component', compact('cart_items'))->extends('layouts.app')->section('content');
    }

    //Funcion para actuzalizar el precio del carrito segun los productos añadidos
    // public function update_quantity($itemId, $quantity){


    //     \Cart::session(auth()->id())->update($itemId, [
    //         'quantity' => array(
    //             'relative' => false,
    //             'value' => $quantity
    //         ),

    //     ]);
    // }

        public function delete_item($itemId){

            Cart::session(auth()->id())->remove($itemId);

            
        }

        public function decrease(Product $product, Request $request)
    {
        $cart = $request->session()->get('cart');

        if (isset($cart[$product->id]) && $cart[$product->id]['quantity'] > 1) {
            $cart[$product->id]['quantity']--;
        }

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }


}
