<?php

namespace App\Http\Livewire\Shop;

use App\Mail\OrderPagada;
use App\Models\Carrito;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    //Declaration of variables
    public  $fname, $lname, $address1, $address2, $email, $city, $state, $zipcode, $phone, $notes;

    public $payment_method;


    /**
 * Render method.
 */
    public function render()
    {
        // Retrieve cart items for the currently authenticated user
        $cartItems = Carrito::where('user_id', Auth::id())->get();

        // Render the 'livewire.shop.checkout-component' view, passing the 'cartItems' variable to it,
        // and extend the 'layouts.app' layout while specifically rendering the 'content' section
        return view('livewire.shop.checkout-component', compact('cartItems'))->extends('layouts.app')->section('content');
    }

    
    //Function to create an order and validate the data implemented by the client

    public function placeorder(Request $request){
             ///////////////////////Orders to be made and their data/////////////////////////////////
             //Validate the fields
            $request->validate([
                  'fname' => 'required',
                  'lname' => 'required',
                  'address1' => 'required',
                  'address2' => '', 
                  'city' => 'required',
                  'email' => 'required',
                  'state' => 'required',
                  'zipcode' => 'required',
                  'phone' => 'required',                
              ]);

            /**Create new order with the data provided by the user */
        $order = new Order();
        $order->user_id = Auth::id(); 
        $order->order_number = uniqid('OrderNumber-');

        //Total products in the cart
        $order->shipping_fname = $request->input('fname');
        $order->shipping_lname = $request->input('lname');
        $order->shipping_address1  = $request->input('address1');
        $order->shipping_city = $request->input('city'); 
        $order->shipping_state = $request->input('state');       
        $order->shipping_zipcode = $request->input('zipcode');
        $order->shipping_phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->shipping_address2 = $request->input('address2');
        $order->payment_method = $request->input('payment_method', 'paypal');

        /**
         * We obtain the total of the sum of each product
         */

        $total = 0;
        $cartItems_total = Carrito::where('user_id', Auth::id())->get();

        foreach($cartItems_total as $prod){
            $total += $prod->products->price;
        }
        $order->total = $total;
        $order->save();

   
        
        $cartItems = Carrito::where('user_id', Auth::id())->get();

        // Iterate through each item in the cart
        foreach ($cartItems as $item) {
            // Calculate the total by adding the price of each item
            $total += $item->products->price;

            // Create a new order item
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);

            // Retrieve the product associated with the item
            $prod = Product::where('id', $item->prod_id)->first();

            // Update the quantity of the product by subtracting the quantity in the item
            $prod->qty -= $item->prod_qty;
            $prod->update();

            // Create a new transaction record
            $transaction = new Transactions();
            $transaction->product_id = $item->prod_id;
            $transaction->user_id = Auth::id();
            $transaction->quantity = $item->prod_qty;
            $transaction->price = $item->products->price;
            $transaction->save();

            // Delete the item from the cart
            $item->delete();
        }



        // Check if the shipping address is not set for the authenticated user
        if (Auth::user()->shipping_address1 == NULL) {
            // Retrieve the user record from the database based on the authenticated user's ID
            $user = User::where('id', Auth::id())->first();

            // Update the email address of the user with the value from the request input
            $user->email = $request->input('email');

            // Save the updated user record
            $user->update();
        }

        
        /**
         * An email is sent to the management center, with the order data to start preparing it
         * It is established whether the payment method is with PayPal or with cash
         */

        if ($order->payment_method == 'paypal') {
            Mail::to($order->user->email)->send(new OrderPagada($order));
        
            $order->status = "processing";
            $order->payment_method = "paypal";
            $order->is_paid = "Pagado";
            $order->save(); 
            //Delete products cart
            foreach ($cartItems as $item) {
                $item->delete();
            }

            return response()->json(["status" => "Compra realizada correctamente, pronto le llegará su pedido"]);

        } elseif ($order->payment_method == 'cash_on_delivery') {
            // Send payment order information by email to the user
            Mail::to($order->user->email)->send(new OrderPagada($order));
        
            $order->status = "pending";
            $order->payment_method = "cash_on_delivery";
            $order->is_paid = "No_pagado";
            $order->save();
            //Delete products cart
            foreach ($cartItems as $item) {
                $item->delete();
            }

            return redirect('/')->with('status', 'Compra realizada correctamente, pronto le llegará su pedido');

        }
        

    }



}
