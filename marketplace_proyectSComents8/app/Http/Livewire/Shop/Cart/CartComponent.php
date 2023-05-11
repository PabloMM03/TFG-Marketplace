<?php

namespace App\Http\Livewire\Shop\Cart;

use App\Models\Carrito;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    /**function which allows us to show all the data of the products of the cart of each user */
    public function render()
    {
        $cart_items = Carrito::where('user_id', Auth::id())->get();       
        return view('livewire.shop.cart.cart-component', compact('cart_items'))->extends('layouts.app')->section('content');
    }

/**function that allows us to add products to the cart */
    public function addProductToSingle(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check){

                    $cartItem = new Carrito();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty= $product_qty;
                    $cartItem->save();
      
                    return response()->json(["status" => "Producto añadido al carrito"]);
                }
                
        }
        else{
            return response()->json(["status" => "Debe hacer login para continuar"]);
        }
    }

    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check){

                    $cartItem = new Carrito();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty= $product_qty;
                    $cartItem->save();
    
                    return redirect()->back()->with("status", "Producto añadido al carrito");   
                }
                
        }
        else{
            return redirect()->back()->with("status", "Debe hacer login para continuar");
        }
    }


    public function deleteProduct(Request $request){

        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Carrito::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return redirect()->back()->with('status', 'Producto eliminado correctamente');
            }
        }else{
            return redirect()->back()->with('status', 'Necesita hacer login para continuar');
        }
    }




    //Update Cart Item //Function to update the price of the cart according to the added products
    public function increaseQuantity($itemId)
    {

       $product = Carrito::get($itemId);
       $qty = $product->prod_qty + 1;
    
       Carrito::update($itemId,$qty);

}


public function decreaseQuantity($itemId)
    {

       $product = Carrito::get($itemId);
       $qty = $product->prod_qty - 1;
    
       Carrito::update($itemId,$qty);

}

public function deleteAll(){
    Carrito::truncate();
    return redirect('/')->with('info', 'Carrito vaciado correctamente');
}

}
