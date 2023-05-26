<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Tag;
use Livewire\Component;

class PoliticasDePrivacidad extends Component
{
     /**Page which shows the privacy policies of the marketplace and shows some sections of content */
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

         foreach ($products_news as $product) {
             // Retrieve all ratings for the current product

            $ratings = Rating::where('prod_id', $product->id)->get();

            // Calculate the sum of all ratings for the current product
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');

            // Calculate the average rating value for the current product,
            // which is the sum of ratings divided by the count of ratings,
            // or set it to 0 if there are no ratings
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count(); 
        }
        
        $overall_rating = $products_news->avg('rating_value');


        return view('livewire.shop.politicas-de-privacidad', compact('categories', 'tags', 'products_news'))->extends('layouts.app')->section('content');
    }
}
