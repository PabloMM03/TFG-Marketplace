<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Tag;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SingleProduct extends Component
{
    public $search;
    public $product;

    public function updatingSearch()
    {
        $this->resetPage();
    }

/**
 * Get the related products according to their category
 */

    public function mount(Product $product){
        
        $this->product = $product;

        //System Rating products
        /**
         * The product id is obtained and added as long as the user is authenticated
         */
        $this->ratings = Rating::where('prod_id', $product->id)->get();
        $this->rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
       
        $this->user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();

        if($this->ratings->count() > 0)
        {
            $this->rating_value = $this->rating_sum/$this->ratings->count();
        }else{
            $this->rating_value = 0;
        }


        // You get the specific product for which you want to calculate the percentages of reviews. It is assumed that $product is the object of the product.
        $this->product = Product::findOrFail($product->id);

        // Get the total number of reviews for the product
        $this->totalReviews = Rating::where('prod_id', $product->id)->count();

        if ($this->totalReviews > 0) {
        // Get the number of ratings for each number of stars
        $this->fiveStarReviews = Rating::where('prod_id', $product->id)->where('stars_rated', 5)->count();
        $this->fourStarReviews = Rating::where('prod_id', $product->id)->where('stars_rated', 4)->count();
        $this->threeStarReviews = Rating::where('prod_id', $product->id)->where('stars_rated', 3)->count();
        $this->twoStarReviews = Rating::where('prod_id', $product->id)->where('stars_rated', 2)->count();
        $this->oneStarReviews = Rating::where('prod_id', $product->id)->where('stars_rated', 1)->count();


        // Calculate the percentage of ratings for each number of stars
        $this->fiveStarPercentage = ($this->fiveStarReviews / $this->totalReviews) * 100;
        $this->fourStarPercentage = ($this->fourStarReviews / $this->totalReviews) * 100;
        $this->threeStarPercentage = ($this->threeStarReviews / $this->totalReviews) * 100;
        $this->twoStarPercentage = ($this->twoStarReviews / $this->totalReviews) * 100;
        $this->oneStarPercentage = ($this->oneStarReviews / $this->totalReviews) * 100;

        }else{
            // Set percentages to zero if there are no ratings
            $this->fiveStarPercentage = 0;
            $this->fourStarPercentage = 0;
            $this->threeStarPercentage = 0;
            $this->twoStarPercentage = 0;
            $this->oneStarPercentage = 0;
        }    

        /**Get all categories */
        $this->categories = Category::all();

        /**Get products news */
        $this->products_news = Product::latest()
                                ->where('status', 2)
                                ->take(3)->get();

        //Products related
        $this->relacionados = Product::where('category_id', $product->category_id)
                                      ->where('status', 2)
                                      ->where('id', '!=', $product->id)
                                      ->latest('id')
                                      ->take(6)
                                      ->get();


        // Get the ratings and number of reviews for each product through the new product id
        /**All ratings associated with that product are obtained using the Rating model. 
         * The sum total of the stars classified for that product is calculated
         * The average value of the ratings is calculated by dividing the total sum of the stars ranked by the number of ratings
         */

            foreach ($this->products_news as $product) {
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;
    
                $product->ratings = $ratings;
                $product->rating_value = $rating_value;
                $product->review_count = $ratings->count();
            }

            // Get the ratings and number of reviews for each product through the product related id

            foreach ($this->relacionados as $product) {
                $ratings = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;
    
                $product->ratings = $ratings;
                $product->rating_value = $rating_value;
                $product->review_count = $ratings->count(); 
            }
            
            $this->overall_rating = $this->relacionados->avg('rating_value');

    }
    

    /**
     * Show the product in detail
     */

    public function render()
    {
        
        return view('livewire.shop.single-product', ['product' => $this->product, 'relacionados' => $this->relacionados, 'ratings' 
                                                               => $this->ratings, 'rating_value' => $this->rating_value, 'user_rating' => $this->user_rating, 
                                                               'categories' => $this->categories, 'products_news' => $this->products_news, 'fiveStarPercentage' => $this->fiveStarPercentage,
                                                               'fourStarPercentage' =>$this->fourStarPercentage, 'threeStarPercentage' => $this->threeStarPercentage, 'twoStarPercentage' => $this->twoStarPercentage,
                                                               'oneStarPercentage' =>$this->twoStarPercentage])
                                                    ->extends('layouts.app')->section('content');

    }


     /**
     * Filter by category the products 
     */
    public function category(Category $category){
     $products = Product::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(20);

        return view('livewire.shop.category-component', compact('products','category'));
    }

    /**Filter by tag */
    public function tag(Tag $tag){
        $products =  $tag->products()->where('status',2)
                                ->latest('id')
                                ->paginate(20);
    

       return view('livewire.shop.tag-component', compact('products','tag'));
    }

 /**
     * Method to add products to the wishlist
     */
    public function add(Request $request){
        if(auth()->check()){
            $product_id = $request->input('product_id');
            $user_id = Auth::id();

            //It is checked if it is already on the wish list   
            $existingWish = Wishlist::where('user_id', $user_id)->where('prod_id', $product_id)->first();
            if($existingWish){
                //  The product is already on the user's wish list
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
