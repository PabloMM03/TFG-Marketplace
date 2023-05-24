<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        /**All products */
        
        $products = Product::where('status', 2)
                            ->latest('id')
                            ->take(8)->get();
       


        // Get the ratings and number of reviews for each product through the product id

            foreach ($products as $product) {
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;
    
                $product->ratings = $ratings;
                $product->rating_value = $rating_value;
                $product->review_count = $ratings->count();
            }
            
            $overall_rating = $products->avg('rating_value');


        /*Featured products */
        $popular_products = Product::where('status', 2)
                                    ->where('trending' ,2)
                                    ->take(8)->get();

            // Get the ratings and number of reviews for each product through the product new id

            foreach ($popular_products as $product) {
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

                $product->ratings = $ratings;
                $product->rating_value = $rating_value;
                $product->review_count = $ratings->count();
            }


         /**Products news */                           
        $products_news = Product::latest()
                        ->where('status', 2)
                        ->take(8)->get();

        // Get the ratings and number of reviews for each product through the product new id

                        foreach ($products_news as $product) {
                            $ratings = Rating::where('prod_id', $product->id)->get();
                            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;
                
                            $product->ratings = $ratings;
                            $product->rating_value = $rating_value;
                            $product->review_count = $ratings->count();
                        }

        $categories = Category::all();


        // return view('livewire.shop.index-component',compact('products', 'popular_products', 'products_news', 'categories'))->extends('layouts.app')->section('content');
        return view('livewire.shop.index-component', compact('products', 'popular_products', 'products_news', 'categories', 'overall_rating'))->extends('layouts.app')->section('content');
    }
    
    /**
     * Method to obtain all products with published status and add them to a search engine
     */

    public function productlistAjax(){

        $products = Product::select('name')->where('status' , '2')->get();
        $data = [];

        foreach($products as $item){
            $data[] = $item['name'];
        }
        return $data;
    }

    /**
     * Method that allows you to search for the products of the store
     */

    public function searchproduct(Request $request){

        $searched_product = $request->product_name;

        if($searched_product != ""){ 
            $product = Product::where("name", "LIKE", '%'. $searched_product . '%')->first();
            if($product){
                return redirect('products/'.$product->id);
            }else{
                return redirect()->back()->with("status", "No hay productos con ese nombre");
            }

        }else{
            return redirect()->back();
        }
    }
}
