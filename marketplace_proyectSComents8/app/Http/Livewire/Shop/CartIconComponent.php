<?php

namespace App\Http\Livewire\Shop;

use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartIconComponent extends Component
{
    
/**
 * Render method.
 */
public function render()
{
    // Retrieve cart items for the currently authenticated user
    $cart_items = Carrito::where('user_id', Auth::id())->get();

    // Render the 'livewire.shop.cart-icon-component' view and pass the 'cart_items' variable to it
    return view('livewire.shop.cart-icon-component', compact('cart_items'));
}

}
