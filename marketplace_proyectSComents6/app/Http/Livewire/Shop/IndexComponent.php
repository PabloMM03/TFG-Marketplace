<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
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
        
         $products = Product::where('status', 2)
                             ->where('name', 'LIKE','%'.$this->search . '%')
                             ->orWhere('price', 'LIKE', '%'.$this->search.'%')
                             ->latest('id')
                             ->paginate(50);

        $featured_products = Product::where('status', 2)
                                    ->where('trending' ,2)
                                    ->take(15)->get();

        return view('livewire.shop.index-component',compact('products', 'featured_products'))->extends('layouts.app')->section('content');

        // return view('livewire.shop.index-component', ['products' => $this->products, 'featured_products' => $this->featured_products])->extends('layouts.app')->section('content');
    }

    public function add_to_cart(Product $product){
            // dd($product); -< comprobar

                // add the product to cart 
                //Check that the user is logged in
                if (!auth()->check()) {
                    return redirect()->guest('login');
                }else{

                    Cart::session(auth()->id())->add(array( //Obtenemos el usuario loguedado
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'image' => $product->product_image,
                        'quantity' => 1,
                        'attributes' => array(),
                        'associatedModel' => $product
                    ));

                    //Mensaje de confirmacion
                    $this->emit('message', 'El producto se ha añadido correctemente.');
                    $this->emitTo('shop.cart-component', 'add_to_cart');   
         
                }


    }


    
}
