@extends('adminlte::page')

@section('title', 'Tienda PM')

@section('content_header')
<div class="card-header">
    @can('admin.categories.create')
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.categories.create')}}">Añadir Categoria</a>
    @endcan
    <h1>Listado de categorias</h1>
</div>
    
@stop

@section('content')

{{--Deletion confirmation alert category--}}
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif
   
    <div class="card">
        
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><img class="default-img" src="@if($category->category_image) {{asset('storage/category/'.$category->category_image)}} @else {{asset('img/default_product.jpg')}}  @endif" width="80px" height="70px" alt=""></td>
                            <td>{{$category->name}}</td>
                            @can('admin.categories.edit')
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a></td>
                            @endcan
                            
                            <td width="10px">
                                @can('admin.categories.destroy')
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST" class="formulario-eliminar">
                                    @csrf    
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                @endcan
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar') == 'Categoria eliminada correctamente')
<script>
     Swal.fire(
       'Eliminada!',
       'Tu categoria ha sido eliminada.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Esta categoria se eliminará definitivamente!",
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