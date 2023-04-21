<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container px-4 px-lg-5 my-5">
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        @foreach($featured_products as $featured_product)
                        <div class="col mb-5">
                        <div class="item">
                            <div class="card">
                                <img src="@if($featured_product->product_image) {{asset('storage/products/'. $featured_product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                                <div class="card-body">
                                    <h5>{{$featured_product->name}}</h5>
                                    <small>{{$featured_product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
           </div>
        </div>
        {{-- <img src="../img/paisaje1.jpg" alt="First slide"  width="1100" height="550"> --}}
        <div class="carousel-caption d-none d-md-block">
          {{-- <h5>Lago1</h5>
          <p>Irlanda</p> --}}
        </div>
      </div>
      <div class="carousel-item">
        {{-- <img src="../img/paisaje2.jpg" alt="Second slide" width="1100" height="550"> --}}
        <div class="container px-4 px-lg-5 my-5">
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        
                        @foreach($featured_products as $featured_product)
                        <div class="col mb-5">
                        <div class="item">
                            <div class="card">
                                <img src="@if($featured_product->product_image) {{asset('storage/products/'. $featured_product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                                <div class="card-body">
                                    <h5>{{$featured_product->name}}</h5>
                                    <small>{{$featured_product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    
                    </div>
                </div>
           </div>
        </div>
        <div class="carousel-caption d-none d-md-block">
          {{-- <h5>Lago2</h5>
          <p>Noruega</p> --}}
        </div>
      </div>
      <div class="carousel-item">
        <div class="container px-4 px-lg-5 my-5">
            <div class="py-5">
                <div class="container">
                    <div class="row">
                        
                        @foreach($featured_products as $featured_product)
                        <div class="col mb-5">
                        <div class="item">
                            <div class="card">
                                <img src="@if($featured_product->product_image) {{asset('storage/products/'. $featured_product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                                <div class="card-body">
                                    <h5>{{$featured_product->name}}</h5>
                                    <small>{{$featured_product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    
                    </div>
                </div>
           </div>
        </div>
        {{-- <img src="../img/paisaje3.jpg" alt="Third slide" width="1100" height="550"> --}}
        <div class="carousel-caption d-none d-md-block">
          {{-- <h5>Lago3</h5>
          <p>Canada</p> --}}
        </div>
      </div>
    </div>
  
    <!-- Flechas -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">  {{$featured_products->links()}} </span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">{{$featured_products->links()}} </span>
      </a>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
{{--     
    <div class="py-5">
            <div class="container">
                <div class="row">
                    
                    @foreach($featured_products as $featured_product)
                    <div class="col mb-5">
                    <div class="item">
                        <div class="card">
                            <img src="@if($featured_product->product_image) {{asset('storage/products/'. $featured_product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                            <div class="card-body">
                                <h5>{{$featured_product->name}}</h5>
                                <small>{{$featured_product->price}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                
                </div>
            </div>
       </div>
        --}}

