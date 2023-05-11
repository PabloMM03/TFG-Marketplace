<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Wishlist;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListComponent extends Component
{
    public function render()
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('livewire.shop.wish-list-component', compact('wishlist'))->extends('layouts.app')->section('content');
    }

    public function add(Request $request){
        
        if(auth()->check()){
            $product_id = $request->input('product_id');
            $user_id = Auth::id();
    
            $existingWish = Wishlist::where('user_id', $user_id)->where('prod_id', $product_id)->first();
            if($existingWish){
                // El producto ya está en la lista de deseos del usuario
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
    

    //Delete Wishlist Item
    public function deleteItem(Request $request){
        
        if(auth()->check()){
            $product_id = $request->input('product_id');
            if(Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()){
                $wish = Wishlist::where('prod_id', $product_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return redirect()->back()->with('status', "Producto eliminado correctamente"); 
            }
        }else{
            return redirect()->back()->with('status', "Necesita hacer el login para continuar"); 
        }

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
            $this->emitTo('shop.wish-list-component', 'add_to_cart');
            return redirect()->back()->with('status', "Producto añadido correctamente"); 
 }
}


}
