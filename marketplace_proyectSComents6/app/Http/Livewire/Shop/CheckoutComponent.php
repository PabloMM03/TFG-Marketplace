<?php

namespace App\Http\Livewire\Shop;

use App\Mail\OrderPagada;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    //Declaration of variables
    public  $fullname, $address, $city, $state, $zipcode, $phone;

    public $billing_fullname, $billing_address, $billing_city, $billing_state, $billing_zipcode, $billing_phonde;

    public $payment_method, $total;


    public function render()
    {
        
        return view('livewire.shop.checkout-component')->extends('layouts.app')->section('content');
    }
    
    //Function to create an order and validate the data implemented by the client
    public function make_order()
    {
        $this->validate([
            'fullname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'payment_method' => 'required'
        ]);

        ///////////////////////Orders to be made and their data/////////////////////////////////

        $order = new Order();

        $order->user_id = auth()->id();
        $order->order_number = uniqid('OrderNumber-');
        //Total products in the cart
        $order->item_count = Cart::session(auth()->id())->getContent()->count();

        $order->shipping_fullname = $this->fullname;
        $order->shipping_address  = $this->address;
        $order->shipping_city = $this->city;
        $order->shipping_state = $this->state;
        $order->shipping_zipcode = $this->zipcode;
        $order->shipping_phone = $this->phone;


        if (is_null($this->billing_fullname)) {
            $order->billing_fullname = $this->fullname;
            $order->billing_address  = $this->address;
            $order->billing_city = $this->city;
            $order->billing_state = $this->state;
            $order->billing_zipcode = $this->zipcode;
            $order->billing_phone = $this->phone;
        } else {
            $order->billing_fullname = $this->billing_fullname;
            $order->billing_address  = $this->billing_address;
            $order->billing_city = $this->billing_city;
            $order->billing_state = $this->billing_state;
            $order->billing_zipcode = $this->billing_zipcode;
            $order->billing_phone = $this->billing_phone;
        }

        if(Auth::user()->billing_address == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->billing_fullname = $this->fullname;
            $user->shipping_address  = $this->address;
            $user->shipping_city = $this->city;
            $user->shipping_state = $this->state;
            $user->shipping_zipcode = $this->zipcode;
            $user->shipping_phone = $this->phone;
            $user->update();
        }

        $order->payment_method = $this->payment_method;
        //Get total cart and purchase
        $order->total = Cart::session(auth()->id())->getTotal();
        $order->save(); //Save order changes
        // $order->is_paid,

        //Creation of items that are in the cart for the order of the order

        $cartItems = Cart::session(auth()->id())->getContent();
            //$cartItems as $key => $item
        foreach ($cartItems as  $item) {
            $order->items()->attach($item->id, [
                'price' => $item->price,             //Data to display
                'quantity' => $item->quantity,
            ]);
            //Reduce products as they run out
            $prod = Product::where('id', $item->id)->first();
            $prod->qty = $prod->qty - $item->quantity;
            $prod->update();
        }

        //Check payment method
        if ($this->payment_method == 'paypal') {
            Mail::to($order->user->email)->send(new OrderPagada($order));

            $order->save();
            Cart::session(auth()->id())->clear(); //Empty cart
            return redirect()->route('paypal.checkout', $order->id);
        }
        if ($this->payment_method == 'cash_on_delivery') {
            //Send payment confirmation email to user
            Mail::to($order->user->email)->send(new OrderPagada($order));

            $order->save();
            Cart::session(auth()->id())->clear(); //Empty cart
            return redirect('/')->with('info', 'Compra realizada correctamente, pronto le llegará su pedido');
        }
    }
}
