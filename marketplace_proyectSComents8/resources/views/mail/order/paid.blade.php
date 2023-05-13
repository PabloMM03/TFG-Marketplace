<x-mail::message>
# Factura 

Gracias pro la compra
aquí esta su factura

{{--Invoice generation--}}
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{$item->pivot->qty}}</td>
            <td>{{$item->pivot->price}}€</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Total: {{$order->total}} € --}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Gracias,<br>
{{-- {{ config('app.name') }} --}}
TradeVibes 
</x-mail::message>
