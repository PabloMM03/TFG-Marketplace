<?php

namespace App\Http\Middleware;

use App\Models\Carrito;
use Closure;
use Illuminate\Http\Request;

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
        // Retrieve all items from the Carrito model
        $carrito = Carrito::all();

        // Count the number of items in the cart
        $cart = $carrito->count();

        // Check if the cart is empty
        if ($cart < 1) {
            // Redirect back to the previous page with a flash message indicating that the cart is empty
            return redirect()->back()->with('status', "El carrito está vacío");
        }

        // If the cart is not empty, proceed to the next middleware or request handler
        return $next($request);
    }
}
