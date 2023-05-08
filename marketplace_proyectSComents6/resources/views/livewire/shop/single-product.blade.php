<div class="container" py-8>
  <style>
      /* rating */
.rating-css div {
  color: #ffe400;
  font-size: 30px;
  font-family: sans-serif;
  font-weight: 800;
  text-align: center;
  text-transform: uppercase;
  padding: 20px 0;
}
.rating-css input {
  display: none;
}
.rating-css input + label {
  font-size: 60px;
  text-shadow: 1px 1px 0 #8f8420;
  cursor: pointer;
}
.rating-css input:checked + label ~ label {
  color: #b4afaf;
}
.rating-css label:active {
  transform: scale(0.8);
  transition: 0.3s ease;
}
.checked{
  color:#ffd900
}

/* End of Star Rating */
  </style>

  @can('published', $product)



  <main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Inicio</a>
                <span></span> {{$product->id}}
                <span></span> {{$product->name}}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                          <img src="@if($product->product_image) {{asset('storage/products/'. $product->product_image)}} 
                                          @else {{asset('img/default_product.jpg')}}  @endif" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-1.jpg')}}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-3.jpg')}}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-4.jpg')}}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-5.jpg')}}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-6.jpg')}}" alt="product image">
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('assets/imgs/shop/product-16-7.jpg')}}" alt="product image">
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-3.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-4.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-5.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-6.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-7.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-8.jpg"')}}" ></div>
                                        <div><img src="{{asset('assets/imgs/shop/thumbnail-9.jpg"')}}" ></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{$product->name}}</h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Marcas: <a href="shop.html">{{$product->brand}}</a></span>
                                        </div>
                                        <div class="product-rate-cover text-end">
                                          {{-- <div class="product-rate d-inline-block"></div> --}}
                                            <div>
                                              {{--Ratings--}}
                                              @php $ratenum  = number_format($rating_value) @endphp
                                              <div class="rating">
                                                  @for($i = 1; $i<= $ratenum; $i++)
                                                  <i class=" fa bi-star checked"></i>
                                                  @endfor
                                                  @for($j = $ratenum+1; $j <= 5; $j++)
                                                  <i class=" fa bi-star"></i>
                                                  @endfor
                                              </div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> 
                                              @if($ratings->count() > 0)
                                                  {{$ratings->count()}} reviews
                                                  @else
                                                  0 reviews
                                                  @endif
                                              </span>                                        
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">{{$product->price}} €</span></ins>
                                            <ins><span class="old-price font-md ml-15">@if($product->original_price){{$product->original_price}} € @else {{$product->original_price = ""}}@endif </span></ins>
                                            <span class="save-price  font-md color3 ml-15">25% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{$product->description}}!</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year</li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <ul class="list-filter color-filter">
                                            <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                            <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                            <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                            <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                            <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                            <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                            <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <ul class="list-filter size-filter font-small">
                                            <li><a href="#">S</a></li>
                                            <li class="active"><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <div class="detail-extralink">
                                          <input type="number" id="v{{$product->id}}" wire:change="update_quantity({{ $product->id }}, $event.target.value)" style="max-width: 3rem" value="1">
                                        
                                        <div class="product-extra-link2">
                                            @if($product->qty >0)
                                            <button class="btn btn-outline-dark flex-shrink-0 formulario-add" wire:click="add_to_cart({{$product->id}})" type="button">
                                                Add to cart
                                            </button>
                                            @else
                                            <button class="btn btn-outline-dark flex-shrink-0 disabled" wire:click="add_to_cart({{$product->id}})" type="button">
                                                Add to cart
                                            </button>   
                                            @endif
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="#"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">SKU: <a href="#">@if($product->brand){{$product->brand}} @else SKU: BST-498 @endif</a></li>
                                        <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                        <li>Availability:<span class="in-stock text-success ml-5">@if($product->qty > 0){{$product->qty}} @else {{$product->qty = 0}} @endif Items In Stock</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Descripción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Información adicional</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                              {{--Description--}}
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{{$product->description}}</p>
                                        
                                        <ul class="product-more-infor mt-30">
                                            <li><span>Tipo de empaquetado</span> Bottle</li>
                                            <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                            <li><span>Cantidad por caja</span> 100ml</li>
                                        </ul>
                                        <hr class="wp-block-separator is-style-dots">
                                        <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey hello far meadowlark imitatively egregiously hugged that yikes minimally unanimous pouted flirtatiously as beaver beheld above forward
                                            energetic across this jeepers beneficently cockily less a the raucously that magic upheld far so the this where crud then below after jeez enchanting drunkenly more much wow callously irrespective limpet.</p>
                                        <h4 class="mt-30">Packaging & Delivery</h4>
                                        <hr class="wp-block-separator is-style-wide">
                                        <p>Less lion goodness that euphemistically robin expeditiously bluebird smugly scratched far while thus cackled sheepishly rigid after due one assenting regarding censorious while occasional or this more crane
                                            went more as this less much amid overhung anathematic because much held one exuberantly sheep goodness so where rat wry well concomitantly.
                                        </p>
                                        <p>Scallop or far crud plain remarkably far by thus far iguana lewd precociously and and less rattlesnake contrary caustic wow this near alas and next and pled the yikes articulate about as less cackled dalmatian
                                            in much less well jeering for the thanks blindly sentimental whimpered less across objectively fanciful grimaced wildly some wow and rose jeepers outgrew lugubrious luridly irrationally attractively
                                            dachshund.
                                        </p>
                                    </div>
                                </div>
                                {{--Additional info--}}
                                <div class="tab-pane fade" id="Additional-info">
                                    <table class="font-md">
                                        <tbody>
                                            <tr class="stand-up">
                                                <th>Stand Up</th>
                                                <td>
                                                    <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-wo-wheels">
                                                <th>Folded (w/o wheels)</th>
                                                <td>
                                                    <p>32.5″L x 18.5″W x 16.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-w-wheels">
                                                <th>Folded (w/ wheels)</th>
                                                <td>
                                                    <p>32.5″L x 24″W x 18.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="door-pass-through">
                                                <th>Door Pass Through</th>
                                                <td>
                                                    <p>24</p>
                                                </td>
                                            </tr>
                                            <tr class="frame">
                                                <th>Frame</th>
                                                <td>
                                                    <p>Aluminum</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-wo-wheels">
                                                <th>Weight (w/o wheels)</th>
                                                <td>
                                                    <p>20 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-capacity">
                                                <th>Weight Capacity</th>
                                                <td>
                                                    <p>60 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="width">
                                                <th>Width</th>
                                                <td>
                                                    <p>24″</p>
                                                </td>
                                            </tr>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Handle height (ground to handle)</th>
                                                <td>
                                                    <p>37-45″</p>
                                                </td>
                                            </tr>
                                            <tr class="wheels">
                                                <th>Wheels</th>
                                                <td>
                                                    <p>12″ air / wide track slick tread</p>
                                                </td>
                                            </tr>
                                            <tr class="seat-back-height">
                                                <th>Seat back height</th>
                                                <td>
                                                    <p>21.5″</p>
                                                </td>
                                            </tr>
                                            <tr class="head-room-inside-canopy">
                                                <th>Head room (inside canopy)</th>
                                                <td>
                                                    <p>25″</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_color">
                                                <th>Color</th>
                                                <td>
                                                    <p>Black, Blue, Red, White</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_size">
                                                <th>Size</th>
                                                <td>
                                                    <p>M, S</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{--Reviews--}}
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Preguntas y respuestas de los clientes</h4>
                                                <div class="comment-list">

                                                  @forelse ($product->comments as $comment)                                         
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="{{asset('assets/imgs/page/avatar-6.jpg')}}" alt="">
                                                                <h6><a href="#"> 
                                                                  @if ($comment->user)
                                                                  {{$comment->user->name}}
                                                                  @endif</a></h6>
                                                                <p class="font-xxs">Since 2012</p>
                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p>{!! $comment->comment_body !!}</p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30">{{$comment->created_at->format('d-m-Y')}} December 4, 2020 at 3:12 pm </p>
                                                                        <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    <div class="card card-body shadow-sm mt-3">
                                                    <h6>Sin comentarios hasta el momento.</h6>
                                                    </div>
                                                    @endforelse
                                                   
                                                    <!--single-comment -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Customer reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-15">Añadir una review</h4>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form action="{{url('/add-rating')}}" method="POST"> 
                                                  @csrf

                                                  <input type="hidden" name="product_id" value="{{$product->id}}">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Valorar: {{ $product->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                              </div>

                                              <div class="modal-body">
                                                  <div class="rating-css">
                                                      <div class="star-icon">
                                                          @if($user_rating)
                                                              @for($i = 1; $i<= $user_rating->stars_rated; $i++)
                                                              <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                                              <label for="rating{{$i}}" class="fa bi-star"></label>
                                                              @endfor
                                                              @for($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                                              <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                              <label for="rating{{$j}}" class="fa bi-star"></label>
                                                              @endfor
                                                          
                                                          @else
                                                          <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                          <label for="rating1" class="fa bi-star"></label>
                                                          <input type="radio" value="2" name="product_rating" id="rating2">
                                                          <label for="rating2" class="fa bi-star"></label>
                                                          <input type="radio" value="3" name="product_rating" id="rating3">
                                                          <label for="rating3" class="fa bi-star"></label>
                                                          <input type="radio" value="4" name="product_rating" id="rating4">
                                                          <label for="rating4" class="fa bi-star"></label>
                                                          <input type="radio" value="5" name="product_rating" id="rating5">
                                                          <label for="rating5" class="fa bi-star"></label>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-dark flex-shrink-0 " data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-outline-dark flex-shrink-0 formulario-calificar">Guardar cambios</button>
                                              </div>
                                          </form> 
                                            </div>
                                          </div>
                                        </div>                                           
                                        <button type="button" class="btn btn-outline-dark flex-shrink-0 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Valorar
                                        </button>
                         
                                        {{-- <div class="product-rate d-inline-block mb-30">
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                              <form class="form-contact comment_form" action="{{url('comments')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                              <textarea class="form-control w-100" name="comment_body" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group">
                                                      <button type="submit" class="button button-contactForm">Comentar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                  @foreach ($relacionados as $relacionado)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="product-details.html" tabindex="0">
                                                        <img class="default-img" src="@if($relacionado->product_image) {{asset('storage/products/'. $relacionado->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="Card image cap">
                                                        {{-- <img class="hover-img" src="{{asset('assets/imgs/shop/product-2-2.jpg')}}" alt=""> --}}
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" href="{{route('publicaciones.show',$relacionado)}}"><i class="fi-rs-search"></i></a>
                                                    <form action="{{url('add-to-wishlist')}}" method="POST" style="display: inline;">
                                                      @csrf
                                                      <input type="hidden" name="product_id" value="{{$relacionado->id}}">
                                                      <button type="hidden" class="action-btn small hover-up" aria-label="Add To Wishlist"><i class="fi-rs-heart"></i></button>
                                                    </form>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="#" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                  <div class="info">
                                                    @if($relacionado->trending == 2)
                                                    <span class="badge bg-warning mt-2" style="w-70px" title="Con esta etiqueta seleccionamos los productos que actualmente son tendencia, pero asegurando la mejor calidad y disponibilidad.">Trending <i class="bi bi-info-circle"></i> 
                                                    </span>                                                  
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="{{route('publicaciones.show',$relacionado)}}" tabindex="0">{{$relacionado->name}}</a></h2>
                                                {{-- <div class="rating-result" title="90%"> --}}
                                                  @php $ratenum  = number_format($rating_value) @endphp
                                                  <div class="rating  mb-2">
                                                      @for($i = 1; $i<= $ratenum; $i++)
                                                      <i class=" fa bi-star checked"></i>
                                                      @endfor
                                                      @for($j = $ratenum+1; $j <= 5; $j++)
                                                      <i class=" fa bi-star"></i>
                                                      @endfor
                                                      <br>
                                                      <span>
                                                          @if($ratings->count() > 0)
                                                          {{$ratings->count()}} reviews
                                                          @else
                                                          0 reviews
                                                          @endif
                                                      </span>
                                                  </div>
                                                    <span>
                                                    </span>
                                                <div class="product-price">
                                                    <span>{{$relacionado->price}} €</span>
                                                    <span class="old-price">@if($relacionado->original_price){{$relacionado->original_price}} € @else {{$relacionado->original_price = ""}}@endif </span>
                                                </div>
                                                {{--It is checked if the amount of remaining products is greater than 0, if so the product is in stock, 
                                                      however if it is equal to or less than 0 would show in the mesaje that is not in stock--}}
                                                <div class="col-md-9 ml-15 mt-2">
                                                  @if($relacionado->qty > 0)
                                                  <label class="badge bg-success">In stock</label>
                                                  @else
                                                  <label class="badge bg-danger">Out of stock</label>
                                                  @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach                

                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-category mb-30">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                        <ul class="categories">
                            <li><a href="shop.html">Shoes & Bags</a></li>
                            <li><a href="shop.html">Blouses & Shirts</a></li>
                            <li><a href="shop.html">Dresses</a></li>
                            <li><a href="shop.html">Swimwear</a></li>
                            <li><a href="shop.html">Beauty</a></li>
                            <li><a href="shop.html">Jewelry & Watch</a></li>
                            <li><a href="shop.html">Accessories</a></li>
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Fill by price</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <div class="label-input">
                                        <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">
                                <label class="fw-900">Color</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                </div>
                                <label class="fw-900 mt-15">Item Condition</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">New products</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                <p class="price mb-0 mt-5">$99.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Chen Sweater</a></h6>
                                <p class="price mb-0 mt-5">$89.50</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:80%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h6><a href="product-details.html">Colorful Jacket</a></h6>
                                <p class="price mb-0 mt-5">$25</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</main>


 
  </div>
  </div>
  @endcan
  </div>
  <br>


{{--Dynamic alert messages--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if (session('status') == "Producto valorado, Gracias por su valoración.")
<script> 
Swal.fire({
position: 'top-end',
icon: 'success',
title: '{{session('status')}}',
showConfirmButton: false,
timer: 2000
})
</script>
@elseif(session('status') == "No puedes valorar este producto sin haberlo comprado.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "El enlace que ha seguido no esta operativo.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "Debes hacer el login primero.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@endif

{{--Comments message--}}

@if (session('message') == "Comentario creado correctamente.")
<script> 
Swal.fire({
position: 'top-end',
icon: 'success',
title: 'Comentario creado correctamente.',
showConfirmButton: false,
timer: 2000
})
</script>
@elseif(session('message') == "El area del comentario es obligatoria.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'El area del comentario es mandatoria.',
})
</script>
@elseif(session('message') == "No puedes opinar sobre este producto sin haberlo comprado.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'No puedes opinar sobre este producto sin haberlo comprado.',
})
</script>
@elseif(session('message') == "Debes hacer el login primero.")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Debes hacer el login primero.',
})
</script>
@endif

{{--Wishlist--}}


@if (session('status') == "Producto añadido correctamente a su Wishlist")
<script> 
Swal.fire({
position: 'top-end',
icon: 'success',
title: '{{session('status')}}',
showConfirmButton: false,
timer: 2000
})
</script>
@elseif(session('status') == "El producto no existe")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "Necesita hacer el login para continuar")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@elseif(session('status') == "El producto ya está en su Wishlist")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@endif


@if(session('status') == "El carrito está vacio")
<script> 
  Swal.fire({
icon: 'error',
title: 'Oops...',
text: '{{session('status')}}',
})
</script>
@endif