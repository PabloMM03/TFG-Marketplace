<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Tag;
use Livewire\Component;

class TermsConditions extends Component
{
     /**Page which shows the terms and conditions of the marketplace and shows some sections of content */
    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();

        
    /**
     * We get new products in published status
     */

        $products_news = Product::latest()
                                ->where('status', 2)
                                ->take(3)->get();

        // Get the ratings and number of reviews for each product through the product news id
        /**All ratings associated with that product are obtained using the Rating model.    
         * The sum total of the stars classified for that product is calculated
         * The average value of the ratings is calculated by dividing the total sum of the stars ranked by the number of ratings
         */
         foreach ($products_news as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count(); 
        }
        
        $overall_rating = $products_news->avg('rating_value');

        return view('livewire.shop.terms-conditions', compact('categories', 'tags', 'products_news'))->extends('layouts.app')->section('content');
    }
}
