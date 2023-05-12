<?php

namespace App\Http\Livewire;

use App\Models\Carrito;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Wishlist;

class Navigation extends Component
{
    //Crear Nav personalizado
    public function render()
    {
        $productos = Product::all();
        $categories = Category::all();
        $wishlist = Wishlist::all();
        $tags = Tag::all();
        $cart = Carrito::all();
        
        return view('livewire.navigation', compact('productos', 'categories', 'tags', 'wishlist', 'cart'));
    }
}
