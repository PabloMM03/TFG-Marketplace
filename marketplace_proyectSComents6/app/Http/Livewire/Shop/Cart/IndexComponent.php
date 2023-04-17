<?php

namespace App\Http\Livewire\Shop\Cart;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class IndexComponent extends Component
{
    public function render()
    {
        $cart_items = Cart::session(auth()->id())->getContent();
        return view('livewire.shop.cart.index-component', compact('cart_items'))->extends('layouts.app')->section('content');
    }

    
    //Delete Cart Item
        public function delete_item($itemId){
            Cart::session(auth()->id())->remove($itemId);
        }

        public function vaciar_carrito(){
            Cart::session(auth()->id())->clear(); //Vaciar carrito
        }

        //Update Cart Item //Function to update the price of the cart according to the added products
        public function update_quantity($itemId, $quantity)
        {
        Cart::session(auth()->id())->update($itemId,[
            'quantity' => array(
            'relative' => false,
            'value' => $quantity
            ),
        ]);

        return redirect()->back();
    }


}
