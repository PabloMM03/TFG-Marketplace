<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class PruebaComponent extends Component
{
    public function render()
    {
        $featured_products = Product::where('trending', 2)
                                          ->take(15)->get();
        return view('livewire.shop.prueba-component', compact('featured_products'))->extends('layouts.app')->section('content');
    }
}
