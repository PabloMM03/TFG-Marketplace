@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="">Nombre Completo</label>
                        <div class="border p-2">{{$orders->shipping_fullname}}</div>
                        <label for="">Dirección</label>
                        <div class="border p-2">
                            {{$orders->shipping_address}},
                            {{$orders->shipping_city}},
                            {{$orders->shipping_state}},
                        </div>
                        <label for="">Numero de Contacto</label>
                        <div class="border p-2">{{$orders->shipping_phone}}</div>
                        <label for="">Zip code</label>
                        <div class="border p-2">{{$orders->shipping_zipcode}}</div>
                        </div>
                        <div class="col-md-6">
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
                                        <td>{{$order->product->shipping_fullname}}</td>
                                        <td>{{$order->prod_qty}}</td>
                                        <td>{{$order->price}} €</td>
                                        <td>
                                            <img src="{{asset('storage/products/'. $order->product->product_image)}}" alt="Product image">
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection