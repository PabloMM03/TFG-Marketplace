<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

   
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

        /**All products */
        /**
         * Filter by price and order,The minimum and maximum declared above are obtained and 
         * ordered by the price, and the way of ordering that collects it from the view is specified.
         */

        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'ASC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Price: High to Low')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('price', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Por más nuevos')
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->orderBy('created_at', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else
        {
            $products = Product::whereBetween('price',[$this->min_value,$this->max_value])->where('status', 2)->latest('id')->paginate($this->pageSize);
        }

         /**Products news */                           
        $products_news = Product::latest('id')
                        ->where('status', 2)
                        ->take(3)->get();

        $categories = Category::orderBy('name', 'ASC')->get();
    
         // Get the ratings and number of reviews for each product through the product id

         foreach ($products as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count();
        }

         // Get the ratings and number of reviews for each product through the new  product id

         foreach ($products_news as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count();
        }

        $overall_rating = $products->avg('rating_value');


        return view('livewire.shop.shop-component', compact('products', 'products_news', 'categories', 'overall_rating'))->extends('layouts.app')->section('content');

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

   
    /**
     * Method to add products to the wishlist, The product ID is obtained and checked if it already exists in your wishlist If not, it is added
     */
    public function add(Request $request){
        if(auth()->check()){
            $product_id = $request->input('product_id');
            $user_id = Auth::id();
    
            $existingWish = Wishlist::where('user_id', $user_id)->where('prod_id', $product_id)->first();
            if($existingWish){
                // The product is already on the user's wish list
                return redirect()->back()->with('status', "El producto ya está en su Wishlist");
            }else{

            if(Product::find($product_id)){
                $wish = new Wishlist();
                $wish->prod_id = $product_id;
                $wish->user_id = $user_id;
                $wish->save();
    
                return redirect()->back()->with('status', "Producto añadido correctamente a su Wishlist"); 
            }else{
                return redirect()->back()->with('status', "El producto no existe"); 
            }
        }
        }else{
            return redirect()->back()->with('status', "Necesita hacer el login para continuar"); 
        }
    }
    
}
