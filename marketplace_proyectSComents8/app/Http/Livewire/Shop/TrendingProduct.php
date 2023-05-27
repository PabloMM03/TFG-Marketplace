<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Livewire\Component;
use Livewire\WithPagination;

class TrendingProduct extends Component
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

    public function render()
    {

          /**
         * Filter by price and order,The minimum and maximum declared above are obtained and 
         * ordered by the price, and the way of ordering that collects it from the view is specified.
         */
        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'ASC')->where('status', 2)->where('trending', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Price: High to Low')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'DESC')->where('status', 2)->where('trending', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Por más nuevos')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('created_at', 'DESC')->where('status', 2)->where('trending', 2)->latest('id')->paginate($this->pageSize);

        }else
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->where('status', 2)->latest('id')->where('trending', 2)->paginate($this->pageSize);
        }

         /**Products news */                           
        $products_news = Product::latest('id')
                        ->where('status', 2)
                        ->take(3)->get();

        $categories = Category::orderBy('name', 'ASC')->get();

        // Get the ratings and number of reviews for each product through the product id
        /**All ratings associated with that product are obtained using the Rating model. 
         * The sum total of the stars classified for that product is calculated
         * The average value of the ratings is calculated by dividing the total sum of the stars ranked by the number of ratings
         */
        
        foreach ($products as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count();
        }

         // Get the ratings and number of reviews for each product through the new product id

         foreach ($products_news as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count();
        }

                    
            return view('livewire.shop.trending-component', compact('products',  'products_news', 'categories'))->extends('layouts.app')->section('content');
        
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
