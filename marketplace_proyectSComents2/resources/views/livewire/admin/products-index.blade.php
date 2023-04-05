<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Introduzca el nombre del Producto" type="text" wire:model="search">
    </div>

   @if ($products->count())  
   
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>ID Categoria</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Actualización</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img src="{{asset('storage/products/'.$product->product_image)}}" width="80px" height="70px" alt="Image"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}} €</td>
                            <td>{{$product->category_id}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.products.edit', $product)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.products.destroy', $product)}}" method="POST" class="formulario-eliminar">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       <div class="card-footer">
        {{$products->links()}}
       </div>
        
    @else
    <div class="card-body">
        <strong>No hay ningun producto con el nombre indicado.</strong>
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
