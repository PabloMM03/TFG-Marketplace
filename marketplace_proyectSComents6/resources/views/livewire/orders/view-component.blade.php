@extends('layouts.app')

@section('content')
{{--Order View , check details of the order--}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Pedido {{$orders->order_number}}
                        <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detallas de envío</h4>
                            <hr>
                        <label for="">Nombre Completo</label>
                        <div class="border">{{$orders->shipping_fullname}}</div>
                        <label for="">Dirección</label>
                        <div class="border">
                            {{$orders->shipping_address}} ,
                            {{$orders->shipping_city}} ,
                            {{$orders->shipping_state}} 
                        </div>
                        <label for="">Numero de Contacto</label>
                        <div class="border">{{$orders->shipping_phone}}</div>
                        <label for="">Código postal</label>
                        <div class="border ">{{$orders->shipping_zipcode}}</div>
                        <label for="">Método de Pago</label>
                        <div class="border ">{{$orders->payment_method}}</div>
                        </div>
                        
                        <div class="col-md-6">
                            <h4>Detalles de pedido</h4>
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
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->products->price}} €</td>
                                        <td>
                                            <img src="{{asset('storage/products/'. $order->products->product_image)}}" width="70px" alt="Product image">
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="px-2">Percio Total : <span class="float-end">{{$orders->total}} €</span></h4>
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