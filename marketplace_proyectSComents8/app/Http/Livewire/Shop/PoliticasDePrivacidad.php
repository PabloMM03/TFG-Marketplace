<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Livewire\Component;

class PoliticasDePrivacidad extends Component
{
     /**Page which shows the privacy policies of the marketplace and shows some sections of content */
    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $products_news = Product::latest()
                                ->where('status', 2)
                                ->take(3)->get();
        return view('livewire.shop.politicas-de-privacidad', compact('categories', 'tags', 'products_news'))->extends('layouts.app')->section('content');
    }
}
