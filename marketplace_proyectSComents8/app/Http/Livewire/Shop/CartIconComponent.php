<?php

namespace App\Http\Livewire\Shop;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartIconComponent extends Component
{
    
    public function render()
    {
        $cart_items = Carrito::where('user_id', Auth::id())->get();       
        return view('livewire.shop.cart-icon-component', compact('cart_items'));
    }
}
