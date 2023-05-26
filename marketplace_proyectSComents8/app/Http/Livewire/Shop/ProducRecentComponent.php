<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;

class ProducRecentComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

   
    public $pageSize = 12;
    public $orderBy = "Por defecto";

    public $min_value = 0;
    public $max_value = 20000;

    public function updatingSearch()
    {
        $this->resetPage();
    }


    //Collect the most recent products created
    public function render()
    {

        /**
         * Filter by price and order,The minimum and maximum declared above are obtained and 
         * ordered by the price, and the way of ordering that collects it from the view is specified.
         */
        if($this->orderBy == 'Price: Low to High')
        {
            $recents = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'ASC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Price: High to Low')
        {
            $recents = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Por más nuevos')
        {
            $recents = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('created_at', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else
        {
            $recents = Product::whereBetween('price',[$this->min_value,$this->max_value])->where('status', 2)->latest('id')->paginate($this->pageSize);
        }

         /**Products news */                           
        $products_news = Product::latest('id')
                        ->where('status', 2)
                        ->take(3)->get();

        $categories = Category::orderBy('name', 'ASC')->get();

         // Get the ratings and number of reviews for each product through the product id

         foreach ($recents as $product) {
            
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
        // Get the ratings and number of reviews for each product through the product id
         //The same as before but for new products
        foreach ($products_news as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count();
        }

        $overall_rating = $products_news->avg('rating_value');

        return view('livewire.shop.produc-recent-component', compact('recents', 'products_news', 'categories', 'overall_rating'))->extends('layouts.app')->section('content');
    }


     /**
     * Sorting system by quantity of products
     */
    public function changePageSize($size){
        $this->pageSize = $size;
    }

    /**
     * Sorting system by price
     */
    public function changeOrderBy($order){
        $this->orderBy = $order;
    }
}
