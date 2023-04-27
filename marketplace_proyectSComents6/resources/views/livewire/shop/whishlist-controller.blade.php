@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if($wishlist->count() > 0)
            @foreach ($wishlist as $item)
            <div class="col-md-2 col-lg-2 col-xl-2 mb-3">
                <img class="card-img-top" src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
              </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <h6 class="text-muted" style="text-align: center">{{$item->name}}</h6>
                  <h6 class="text-black mb-0" style="text-align: center">{!!$item->description!!}</h6>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex"> 
                  {{-- <input type="number" id="v{{$item->id}}" wire:change="update_quantity($('#v' + {{$item->id}}).val())" class="form-control form-control-sm" value="{{$item->quantity}}"> --}}

                 <input type="number" id="v{{$item->id}}" wire:change="update_quantity({{ $item->id }}, $event.target.value)" class="form-control form-control-sm" value="{{$item->quantity}}">
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h6 class="mb-0">€{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</h6>
                </div>
                
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <button type="button" class="fas fa-times text-muted" wire:click="delete_item({{$item->id}})"><i class="bi bi-trash"></i></button>
                </div>
            @endforeach
            @else
            <h4>No hay productos en tu Wishlist</h4>
            @endif 
        </div>  
    </div>
</div>
