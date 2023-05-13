<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Method which will allow us to create ratings on the products
     */
    public function add(Request $request)
    {
       $stars_rated = $request->input('product_rating');
       $product_id = $request->input('product_id');

       
       $product_check = Product::where('id', $product_id)->where('status', '2')->first();
       if($product_check)
       {
        /**
         * The purchase will be verified, with the corresponding products, so that the valuation is generated to the correct product
         */
        $verify_purchase = Order::where('orders.user_id', Auth::id())
                                ->join('order_items', 'orders.id', 'order_items.order_id')
                                ->where('order_items.prod_id', $product_id)->get();

         /**
          * It will be checked if the user who has bought the product has already made any assessment on it, if not it is created
          */                       
        if($verify_purchase->count() > 0)
        {
            $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if($existing_rating)
            {
                $existing_rating->stars_rated = $stars_rated;
                $existing_rating->update();
            }else{
                Rating::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $product_id,
                    'stars_rated' => $stars_rated,
                ]);
            }
           return redirect()->back()->with('status', "Producto valorado, Gracias por su valoración.");

        }else{
            return redirect()->back()->with('status', "No puedes valorar este producto sin haberlo comprado.");
        }
       }else{
        return redirect()->back()->with('status', "El enlace que ha seguido no esta operativo.");
    }
       
    }
}
