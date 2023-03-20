<?php

namespace App\Http\Livewire\Shop;

use App\Mail\OrderPagada;
use App\Models\Order;
use Darryldecode\Cart\Cart;
use Livewire\Component;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    //declaracion de variables
    public  $fullname, $address, $city, $state, $zipcode, $phone;

    public $billing_fullname, $billing_address, $billing_city, $billing_state, $billing_zipcode, $billing_phonde;

    public $payment_method, $total;


    public function render()
    {
        return view('livewire.shop.checkout-component')->extends('layouts.app')->section('content');
    }
    //funcion para crear una orden y validar los datos implementados por el cliente
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

        ///////////////////////Ordenes a realizar y sus datos/////////////////////////////////

        $order = new Order();

        $order->user_id = auth()->id();
        $order->order_number = uniqid('OrderNumber-');
        //Total de productos del carrito
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

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


        $order->payment_method = $this->payment_method;
        //Obtener total del carritod e compra
        $order->total = \Cart::session(auth()->id())->getTotal();
        $order->save(); //Guardar cambios del pedido
        // $order->is_paid,

        //Creacion de items que estan en el carrito para la orden del pedido

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach ($cartItems as $key => $item) {
            $order->items()->attach($item->id, [
                'price' => $item->price,             //Datos a mostrar
                'quantity' => $item->quantity,
            ]);
        }

        //Comprobar metodo de pago
        if ($this->payment_method == 'paypal') {

            return redirect()->route('paypal.checkout', $order->id);
        }
        if ($this->payment_method == 'cash_on_delivery') {
            //Enviar correo de confirmacion de pago a usuario
            Mail::to($order->user->email)->send(new OrderPagada($order));

            $order->save();
            \Cart::session(auth()->id())->clear(); //Vaciar carrito
            return redirect()->route('shop.index')->with('info', 'Compra realizada correctamente, pronto le llagará su pedido');;
        }
    }
}
