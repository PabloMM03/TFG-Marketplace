<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Tag;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SingleProduct extends Component
{
    use WithPagination;

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
        $this->ratings = Rating::where('prod_id', $product->id)->get();
        $this->rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
       
        $this->user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();

        if($this->ratings->count() > 0)
        {
            $this->rating_value = $this->rating_sum/$this->ratings->count();
        }else{
            $this->rating_value = 0;
        }


        $this->relacionados = Product::where('category_id', $product->category_id)
                                      ->where('status', 2)
                                      ->where('id', '!=', $product->id)
                                      ->latest('id')
                                      ->take(6)
                                      ->get();
    }

/**
 * Show the product in detail
 */

    public function render()
    {
        return view('livewire.shop.single-product', ['product' => $this->product, 'relacionados' => $this->relacionados, 'ratings' 
                                                               => $this->ratings, 'rating_value' => $this->rating_value, 'user_rating' => $this->user_rating])
                                                    ->extends('layouts.app')->section('content');

    }


     /**
     * Filter by category the products mendiante query
     */
    public function category(Category $category){
        // return  $category;
    $products = Product::where('category_id', $category->id)
                        ->where('name', 'LIKE','%'.$this->search . '%')
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(20);

        return view('livewire.shop.category-component', compact('products','category'));
    }

    /**Filter by tag */
    public function tag(Tag $tag){
        $products =  $tag->products()->where('status',2)
                                ->where('name', 'LIKE','%'.$this->search . '%') 
                                ->latest('id')
                                ->paginate(20);
    

       return view('livewire.shop.tag-component', compact('products','tag'));
    }
    /**
     * Add the product to cart
     */

    public function add_to_cart(Product $product){
        // dd($product); -> comprobar
        // add the product to cart 
                //Check that the user is logged in
                if (!auth()->check()) {
                    return redirect()->guest('login');
                }else{

    Cart::session(auth()->id())->add(array( //We get the user logged in
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
    ));
    

    //Confirmation message
    $this->emit('message', 'El producto se ha añadido correctemente.');
    $this->emitTo('shop.cart-component', 'add_to_cart');
    return redirect()->back()->with('status', "Producto añadido correctamente"); 
 }
}

 //Update Cart Item //Function to update the price of the cart according to the added products
 public function update_quantity($productID, $quantity)
 {
 Cart::session(auth()->id())->update($productID,[
     'quantity' => array(
     'relative' => false,
     'value' => $quantity
     ),
 ]);

 return redirect()->back();
}


}
