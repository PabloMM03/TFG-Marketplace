<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Introduzca el nombre del Usuario" type="text" wire:model="search">
    </div>

   @if ($users->count())  
   
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="formulario-eliminar">
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
        {{$users->links()}}
       </div>
        
    @else
    <div class="card-body">
        <strong>No hay ningun usuario con el nombre indicado.</strong>
    </div>
        

 @endif 
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('info') == 'Usuario eliminado correctamente')
<script>
     Swal.fire(
       'Eliminado!',
       'El usuario ha sido eliminado.',
       'success'
    )
</script>
 @endif
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
  title: 'Estás seguro?',
  text: "Este usuario se eliminará definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!',
  cancelButtonText: 'Cancelar!'
}).then((result) => {
  if (result.isConfirmed) {
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
    this.submit();
  }
})
        });
    </script>
@endsection