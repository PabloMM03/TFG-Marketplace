@extends('layouts.app')

@section('content')
{{--Order View , check details of the order--}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white mt-2">Pedido {{$orders->order_number}}
                        <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Volver</a>
                    </h4>
                </div>
                <!--Displays all order data -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detalles de envío</h4>
                            <hr>
                        <label for="">Nombre</label>
                        <div class="border">{{$orders->shipping_fname}}</div>
                        <label for="">Apellidos</label>
                        <div class="border">{{$orders->shipping_lname}}</div>
                        <label for="">Email</label>
                        <div class="border">{{$orders->email}}</div>
                        <label for="">Dirección 1</label>
                        <div class="border">
                            {{$orders->shipping_address1}} ,
                            {{$orders->shipping_city}} ,
                            {{$orders->shipping_state}} 
                        </div>
                        <label for="">Dirección 2</label>
                        <div class="border">
                            {{$orders->shipping_address2}} 
                        </div>
                        <label for="">Numero de Contacto</label>
                        <div class="border">{{$orders->shipping_phone}}</div>
                        <label for="">Código postal</label>
                        <div class="border ">{{$orders->shipping_zipcode}}</div>
                        <label for="">Método de Pago</label>
                        <?php if($orders->payment_method == "cash_on_delivery"){?> 
                            <div class="border ">En efectivo</div><?php
                        }elseif ($orders->payment_method == "paypal") {
                            ?><div class="border ">Paypal</div> <?php
                        }?>
                        </div>
                        @php $total = 0; @endphp

                        <div class="col-md-6">
                            <h4>Detalles del pedido</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Cantidad</th>
                                        <th>Price</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $order)                                      
                                    <tr>
                                        <td>{{$order->products->name}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td>{{$order->price * $order->qty}} €</td>
                                        <td>
                                            <img src="{{asset('storage/products/'. $order->products->product_image)}}" width="70px" alt="Product image">
                                            
                                        </td>
                                    </tr>
                                    <!--Get the total price from the sum of the total price all products -->
                                    @php $total += $order->price * $order->qty; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                           

                            <h3 class="px-2">Precio Total : <span class="float-end">{{$total }} €</span></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection


<style>
    .order-details label{
        font-size: 12px;
        font-weight: 700;
    }

    .order-details div{
        font-size: 14px;
        padding: 6px
    }
</style>