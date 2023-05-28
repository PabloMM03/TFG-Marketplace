@extends('layouts.app')

@section('content')
{{--View of orders placed by the user--}}

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mis Pedidos</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fecha del pedido</th>
                                <th>Order Number</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Depending on the payment method, it shows whether it is PayPal or cash apart from the other data -->
                            @foreach ($orders as $order)                                      
                            <tr>
                                <td>{{date('d-m-y', strtotime($order->created_at))}}</td>
                                <td>{{$order->order_number}}</td>   
                                <td>{{$order->total}} €</td> 
                                <?php if($order->payment_method == "cash_on_delivery"){?> 
                                    <td>En efectivo</td> <?php
                                }elseif ($order->payment_method == "paypal") {
                                    ?> <td>Paypal</td> <?php
                                }?>
                                <?php if($order->status == "processing"){?> 
                                    <td>En proceso</td> <?php
                                }elseif ($order->status == "pending") {
                                    ?> <td>Pendiente</td> <?php
                                }?>
                                <td>
                                    <a href="{{url('view-order/'.$order->id)}}" class="btn btn-outline-dark flex-shrink-0">Ver</a>
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


@endsection