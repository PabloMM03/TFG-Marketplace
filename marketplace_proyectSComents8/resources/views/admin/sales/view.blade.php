@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="d-flex justify-content-between">
                        <h4>Número de orden: {{ $order->order_number }}</h4>
                        <a href="{{ route('admin.sales.index') }}" class="btn btn-warning text-white">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Detalles de envío --}}
                        <div class="col-md-6 order-details">
                            <h4>Detalles de envío</h4>
                            <hr>
                            <label for="">Nombre</label>
                            <div class="border">{{ $order->shipping_fname }}</div>
                            <label for="">Apellidos</label>
                            <div class="border">{{ $order->shipping_lname }}</div>
                            <label for="">Email</label>
                            <div class="border">{{ $order->email }}</div>
                            <label for="">Dirección 1</label>
                            <div class="border">
                                {{ $order->shipping_address1 }},
                                {{ $order->shipping_city }},
                                {{ $order->shipping_state }}
                            </div>
                            <label for="">Dirección 2</label>
                            <div class="border">
                                {{ $order->shipping_address2 }}
                            </div>
                            <label for="">Número de Contacto</label>
                            <div class="border">{{ $order->shipping_phone }}</div>
                            <label for="">Código postal</label>
                            <div class="border">{{ $order->shipping_zipcode }}</div>
                            <label for="">Método de Pago</label>
                            <div class="border">
                                @if ($order->payment_method == "cash_on_delivery")
                                    En efectivo
                                @elseif ($order->payment_method == "paypal")
                                    Paypal
                                @endif
                            </div>
                            <label for="">¿Pagado?</label>
                            <div class="border">
                                @if ($order->payment_method == "cash_on_delivery")
                                    No Pagado, esperando a recogida
                                @elseif ($order->payment_method == "paypal")
                                    Pagado
                                @endif
                            </div>
                        </div>

                        {{-- Detalles del pedido --}}
                        <div class="col-md-6">
                            <h4>Detalles del pedido</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->products->name }}</td>
                                            <td>{{ $orderItem->qty }}</td>
                                            <td>{{ $orderItem->price }}€</td>
                                            <td>
                                                <img src="{{ asset('storage/products/' . $orderItem->products->product_image) }}" width="70px" alt="Product image">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h3 class="px-2">Precio Total: <span class="float-end">{{ $order->total }}€</span></h3>
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
