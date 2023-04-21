    <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel featured-carousel owl-theme">
                    @foreach($featured_products as $featured_product)
                    <div class="item">
                        <div class="card">
                            <img src="@if($featured_product->product_image) {{asset('storage/products/'. $featured_product->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                            <div class="card-body">
                                <h5>{{$featured_product->name}}</h5>
                                <small>{{$featured_product->price}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
       </div>
       

    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>

