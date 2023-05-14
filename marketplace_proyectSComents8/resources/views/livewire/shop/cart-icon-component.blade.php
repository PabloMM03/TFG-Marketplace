<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{route('cart')}}">
        <img alt="" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
       @auth
       <span class="pro-count blue cart-count">{{$cart_items->count()}}</span>
       @else
       <span class="pro-count blue">0</span>
       @endauth
             
  </a>
      <div class="cart-dropdown-wrap cart-dropdown-hm2">
          <ul>
            @php $total = 0; @endphp
            @foreach ($cart_items as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{route('publicaciones.show',$item)}}"><img alt="{{$item->products->name}}" src="@if($item->products->product_image) {{asset('storage/products/'. $item->products->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{route('publicaciones.show',$item)}}">{{substr($item->products->name,0,20)}}</a></h4>
                        <h4><span>{{$item->prod_qty}} × </span>{{$item->products->price}}€</h4>
                    </div>
                </li>
                @php $total += $item->products->price * $item->prod_qty; @endphp
            @endforeach
   
          </ul>
          <div class="shopping-cart-footer">
              <div class="shopping-cart-total">
                   <h4>Total <span>{{$total}} €</span></h4> 
              </div>
              <div class="shopping-cart-button">
                  <a href="{{route('cart')}}" class="outline">View cart</a>
                  <a href="{{route('checkout')}}">Checkout</a>
              </div>
          </div>
      </div>
  </div>
