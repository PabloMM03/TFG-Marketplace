<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                             ->where('name', 'LIKE','%'.$this->search . '%')
                             ->orWhere('price', 'LIKE', '%'.$this->search.'%')
                             ->latest('id')
                             ->paginate(50);

        /*Featured products */
        $featured_products = Product::where('status', 2)
                                    ->where('trending' ,2)
                                    ->take(15)->get();

         /**Products news */                           
        $products_news = Product::latest()
                        ->where('status', 2)
                        ->take(20)->get();

        return view('livewire.shop.index-component',compact('products', 'featured_products', 'products_news'))->extends('layouts.app')->section('content');

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


    /**
     * Method to add products to the wishlist
     */
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
