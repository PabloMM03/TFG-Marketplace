<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Rating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListComponent extends Component
{
    public function render()
    {

        $wishlist = Wishlist::where('user_id', Auth::id())->get();

         // Get the ratings and number of reviews for each product through the product related id
        /**All ratings associated with that product are obtained using the Rating model. 
         * The sum total of the stars classified for that product is calculated
         * The average value of the ratings is calculated by dividing the total sum of the stars ranked by the number of ratings
         */

         foreach ($wishlist as $product) {
            $ratings = Rating::where('prod_id', $product->id)->get();
            $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
            $rating_value = $ratings->count() > 0 ? $rating_sum / $ratings->count() : 0;

            $product->ratings = $ratings;
            $product->rating_value = $rating_value;
            $product->review_count = $ratings->count(); 
        }
        
        return view('livewire.shop.wish-list-component', compact('wishlist'))->extends('layouts.app')->section('content');
    }

    /**
     * It is checked if the user is logged in, if so, the id of the product 
     * and the user is obtained and it is checked if a produt has already been added. If it is the first one is added
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
    

    //The product is deleted by obtaining the product id and the user id
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

 
}
