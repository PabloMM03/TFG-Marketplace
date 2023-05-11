<?php

namespace App\Http\Middleware;

use App\Models\Carrito;
use Closure;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $carrito = Carrito::all();


        $cart = $carrito->count();

        if($cart < 1){
            
            return redirect()->back()->with('status', "El carrito está vacio");
        }


        return $next($request);
    }
}
