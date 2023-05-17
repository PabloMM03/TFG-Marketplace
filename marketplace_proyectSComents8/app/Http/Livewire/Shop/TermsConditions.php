<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Livewire\Component;

class TermsConditions extends Component
{
    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $products_news = Product::latest()
                                ->where('status', 2)
                                ->take(3)->get();

        return view('livewire.shop.terms-conditions', compact('categories', 'tags', 'products_news'))->extends('layouts.app')->section('content');
    }
}
