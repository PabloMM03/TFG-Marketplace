<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class SingleProduct extends Component
{
    public $product;

/**
 * Get the related products according to their category
 */

    public function mount(Product $product){
        
        $this->product = $product;

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
       
        return view('livewire.shop.single-product', ['product' => $this->product, 'relacionados' => $this->relacionados])->extends('layouts.app')->section('content');

    }


     /**
     * filtrar por categoria los productos mendiante consulta
     */
    public function category(Category $category){
        // return  $category;
    $products = Product::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(3);

        return view('livewire.shop.category-component', compact('products','category'));
    }

    /**Filtrar por etiqueta */
    public function tag(Tag $tag){
        $products =  $tag->products()->where('status',2)
                                ->latest('id')
                                ->paginate(4);
    

       return view('livewire.shop.tag-component', compact('products','tag'));
    }

    /**
     * Add the product to cart
     */

    public function add_to_cart(Product $product){
        // dd($product); -> comprobar

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
}
}
