@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
    <h1>Listado de Ventas</h1>
@stop

@section('content')


<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Introduzca el nombre del Producto" type="text" wire:model="search">
    </div>

    @if ($products->count())  
   
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Comprador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @foreach ($product->transactions as $transaction)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{asset('storage/products/'. $transaction->product->product_image)}}" width="70px" alt="Product image"></td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $product->price }}€</td>
                                <td>{{ $transaction->user->name }} - {{ $transaction->user->email }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            
            
       </div>

       <div class="card-footer">
        {{$products->links()}}
       </div>
        
     @else
    <div class="card-body">
        <strong>No hay ninguna venta de momento.</strong>
    </div>
        

 @endif  
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'Producto eliminado correctamente')
<script>
     Swal.fire(
       'Eliminado!',
       'Tu producto ha sido eliminado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Este producto se eliminará definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
})
        });
    </script>

    
@endsection


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
