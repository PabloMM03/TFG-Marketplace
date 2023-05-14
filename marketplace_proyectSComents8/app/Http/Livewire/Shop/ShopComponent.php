<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public $min_value = 0;
    public $max_value = 10000;

    public $pageSize = 12;
    public $orderBy = "Por defecto";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        /**All products */
        
        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::whereBetween('price', [$this->min_value, $this->max_value])->orderBy('price', 'ASC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Price: High to Low')
        {
            $products = Product::whereBetween('price', [$this->min_value, $this->max_value])->orderBy('price', 'ASC')->orderBy('price', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else if($this->orderBy == 'Por más nuevos')
        {
            $products = Product::whereBetween('price', [$this->min_value, $this->max_value])->orderBy('price', 'ASC')->orderBy('created_at', 'DESC')->where('status', 2)->latest('id')->paginate($this->pageSize);

        }else
        {
            $products = Product::whereBetween('price', [$this->min_value, $this->max_value])->where('status', 2)->latest('id')->paginate($this->pageSize);
        }


        /*Featured products */
        $featured_products = Product::where('status', 2)
                                    ->where('trending' ,2)
                                    ->take(15)->get();

         /**Products news */                           
        $products_news = Product::latest()
                        ->where('status', 2)
                        ->take(3)->get();

        $categories = Category::all();

                        

        return view('livewire.shop.shop-component', compact('products', 'featured_products', 'products_news', 'categories'))->extends('layouts.app')->section('content');

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
     * Function that allows us to add to cart
     */
    public function add_to_cart(Product $product){

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
    
}
