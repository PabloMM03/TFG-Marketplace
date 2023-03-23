<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class ProductController extends Controller
{

    //Ver publicaciones de los articulos mas a fondo
    public function show(Product $product){

      $this->authorize('published', $product);

        /**
         * Obtener productos relacionados mediante consulta 
        */
        $relacionados = Product::where('category_id', $product->category_id)
                                    ->where('status', 2)
                                    ->where('id', '!=', $product->id)
                                    ->latest('id')
                                    ->take(6)
                                    ->get();

        return view('publicaciones.show', compact('product', 'relacionados'));
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

        return view('publicaciones.category', compact('products','category'));
    }

    /**Filtrar por etiqueta */
    public function tag(Tag $tag){
        $products =  $tag->products()->where('status',2)
                                ->latest('id')
                                ->paginate(4);
    

       return view('publicaciones.tag', compact('products','tag'));
    }

    public function add_to_cart(Product $product){
        // dd($product); -< comprobar

            // add the product to cart 
    Cart::session(auth()->id())->add(array( //Obtenemos el usuario loguedado
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
    ));

    //Mensaje de confirmacion
    $this->emit('message', 'El producto se ha añadido correctemente.');
    $this->emitTo('shop.cart-component', 'add_to_cart');
}

}
