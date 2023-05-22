@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="d-flex justify-content-between">
                        <h4>Número de orden: {{ $orders->order_number }}</h4>
                        <a href="{{ route('admin.sales.index') }}" class="btn btn-warning text-white">Volver</a>
                      </div>
                      
                </div>
                <div class="card-body">
                    <div class="row">
                        {{--We show the details of the order placed by the user--}}
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
                                        <td>{{$order->price}} €</td>
                                        <td>
                                            <img src="{{asset('storage/products/'. $order->products->product_image)}}" width="70px" alt="Product image">
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h3 class="px-2">Percio Total : <span class="float-end">{{$orders->total}} €</span></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
@stop
