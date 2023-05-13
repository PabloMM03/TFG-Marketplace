<?php

namespace App\Http\Livewire\Shop;

use App\Mail\OrderPagada;
use App\Models\Carrito;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
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


    public function render()
    {
        $cartItems = Carrito::where('user_id', Auth::id())->get();
        return view('livewire.shop.checkout-component', compact('cartItems'))->extends('layouts.app')->section('content');
    }
    
    //Function to create an order and validate the data implemented by the client


    public function placeorder(Request $request){
             ///////////////////////Orders to be made and their data/////////////////////////////////
            //  $this->validate([
            //     'fname' => 'required',
            //     'lname' => 'required',
            //     'address1' => 'required',
            //     'city' => 'required',
            //     'email' => 'required',
            //     'state' => 'required',
            //     'zipcode' => 'required',
            //     'phone' => 'required',
            //     'payment_method' => 'required'
            // ]);
            
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
        foreach ($cartItems as  $item) {
           
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);
            
                //Reduce products as they run out
                $prod = Product::where('id', $item->prod_id)->first();
                $prod->qty = $prod->qty - $item->prod_qty;
                $prod->update();
            
            
        }

        if(Auth::user()->shipping_address1 == NULL){
            $user = User::where('id', Auth::id())->first(); 
            $user->email = $request->input('email');
            $user->update();
        }
        
        /**
         * An email is sent to the management center, with the order data to start preparing it
         */
        $cartItems = Carrito::where('user_id', Auth::id())->get();
        Mail::to($user->email)->send(new OrderPagada($order));
        Carrito::destroy($cartItems);
        return redirect('/')->with('status', 'Compra realizada correctamente, pronto le llegará su pedido');
    }


}
