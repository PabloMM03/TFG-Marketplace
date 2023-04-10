<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Navigation extends Component
{
    //Crear Nav personalizado
    public function render()
    {
        $productos = Product::all();
        $categories = Category::all();
        return view('livewire.navigation', compact('productos', 'categories'));
    }
}
