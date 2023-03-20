@section('content')

@section('sidebar')

    @livewire('nav-panel-left')

@endsection


<div>
    {{-- Se muestra la tienda con los productos y la informacion --}}
    <div class="container">
    
    <div class="row">
    @foreach ($products as $product)
        
    
    <div class="col-md-4">

        <div class="card">
            <img class="card-img-top" src="@if($product->image) {{Storage::url($product->image->url)}} @else https://cdn.pixabay.com/photo/2022/03/23/18/56/beach-7087722_1280.jpg  @endif" alt="Card image cap">
            <div class="card-body"> {{--<a href="{{route('publicaciones.show',$product)}}"> --}}
                <h4 class="card-title" style="text-align: center"><a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}"> {{$product->name}}</a></h4>
                <p class="card-text" style="text-align: center">{!!$product->description!!}</p>
              
                <h3 class="card-text" >{{$product->price}} €</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" wire:click="add_to_cart({{$product->id}})">Añadir al carrito</button>
            </div>
        </div>

    </div>
    
    @endforeach
</div>

    {{$products->links()}} 

</div>

</div>


