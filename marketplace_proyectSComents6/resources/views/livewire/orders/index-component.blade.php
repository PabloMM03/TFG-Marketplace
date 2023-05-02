@extends('layouts.app')

@section('title')
    My Orders
@endsection

@section('content')

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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)                                      
                            <tr>
                                <td>{{date('d-m-y', strtotime($order->created_at))}}</td>
                                <td>{{$order->order_number}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->total}} €</td>
                                <td>
                                    <a href="{{url('view-order/'.$order->id)}}" class="btn btn-primary">View</a>
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