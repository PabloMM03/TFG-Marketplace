<header class="header-area header-style-1 header-height-2">
  <div class="header-top header-top-ptb-1 d-none d-lg-block">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-xl-3 col-lg-4">
                  <div class="header-info">
                  <ul>{{--Select language--}}
                          <li>
                              <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> Spanish <i class="fi-rs-angle-small-down"></i></a>
                              <ul class="language-dropdown">
                                  <li><a href="#"><img src="{{asset('assets/imgs/theme/flag-es.png')}}" alt="">Spanish</a></li>
                                  <li><a href="#"><img src="{{asset('assets/imgs/theme/flag-fr.png')}}" alt="">Français</a></li>
                                  <li><a href="#"><img src="{{asset('assets/imgs/theme/flag-dt.png')}}" alt="">Deutsch</a></li>
                                  <li><a href="#"><img src="{{asset('assets/imgs/theme/flag-ru.png')}}" alt="">Pусский</a></li>
                                  <li><a href="#"><img src="{{asset('assets/imgs/theme/flag-en.png')}}" alt="">English</a></li>
                              </ul>
                          </li>                                
                      </ul>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-4">
                  <div class="text-center">
                      <div id="news-flash" class="d-inline-block">
                          <ul>
                              <li>Get great devices up to 50% off <a href="shop.html">View details</a></li>
                              <li>Supper Value Deals - Save more with coupons</li>
                              <li>Trendy 25silver jewelry, save up 35% off today <a href="#">Shop now</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4">
                  <div class="header-info header-info-right">
                    @auth

                    @else
                    <ul>                                
                        <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a>  / <a href="{{route('register')}}">Sign Up</a></li>
                    </ul>
                    @endauth
                       
                  </div>
              </div>
          </div>
      </div>
  </div>

{{--NAV--}}

  <div class="header-middle d-none d-lg-block">
      <div class="container">
          <div class="header-wrap">
              <div class="logo ">
                  <a href="/"><img src="{{asset('assets/imgs/logo/Mi proyecto2.png')}}" alt="logo"></a>
              </div>
              <div class="header-right">
                  <div class="search-style-1">
                    <form action="{{url('searchproduct')}}" method="POST">
                      @csrf
                    <div class="input-group ml-3 mr-4 mt-2">
                      <input type="search" id="search_product" name="product_name" placeholder="Search products" required aria-describedby="basic-addon1">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </div>
                   </form>
                  </div>

                  <div class="header-action-right">
                    @auth
                      <div class="header-action-2">
                        {{--Wishlist--}}
                        @livewire('shop.wish-list-icon-component')
                        {{--Cart--}}
                        @livewire('shop.cart-icon-component')
                      </div>
                      @endauth
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="header-bottom header-bottom-bg-color sticky-bar">
      <div class="container">
          <div class="header-wrap header-space-between position-relative">
              <div class="logo logo-width-1 d-block d-lg-none">
                  <a href="/"><img src="{{asset('assets/imgs/logo/Mi proyecto2.png')}}" alt="logo"></a>
              </div>

              <div class="header-nav d-none d-lg-flex">
                  <div class="main-categori-wrap d-none d-lg-block">
                      <a class="categori-button-active" href="#">
                          <span class="fi-rs-apps"></span> Browse Categories
                      </a>
                      <div class="categori-dropdown-wrap categori-dropdown-active-large">
                          <ul>
                              <li class="has-children">
                                  <a href="#"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                  <div class="dropdown-menu">
                                      <ul class="mega-menu d-lg-flex">
                                          <li class="mega-menu-col col-lg-7">
                                              <ul class="d-lg-flex">
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Hot & Trending</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Dresses</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Blouses & Shirts</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Hoodies & Sweatshirts</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Women's Sets</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Suits & Blazers</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Bodysuits</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Tanks & Camis</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Coats & Jackets</a></li>
                                                      </ul>
                                                  </li>
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Bottoms</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Leggings</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Skirts</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Shorts</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Jeans</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Pants & Capris</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Bikini Sets</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Swimwear</a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </li>
                                          <li class="mega-menu-col col-lg-5">
                                              <div class="header-banner2">
                                                  <img src="{{asset('assets/imgs/banner/menu-banner-2.jpg')}}" alt="menu_banner1">
                                                  <div class="banne_info">
                                                      <h6>10% Off</h6>
                                                      <h4>New Arrival</h4>
                                                      <a href="#">Shop now</a>
                                                  </div>
                                              </div>
                                              <div class="header-banner2">
                                                  <img src="{{asset('assets/imgs/banner/menu-banner-3.jpg')}}" alt="menu_banner2">
                                                  <div class="banne_info">
                                                      <h6>15% Off</h6>
                                                      <h4>Hot Deals</h4>
                                                      <a href="#">Shop now</a>
                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              <li class="has-children">
                                  <a href="#"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                  <div class="dropdown-menu">
                                      <ul class="mega-menu d-lg-flex">
                                          <li class="mega-menu-col col-lg-7">
                                              <ul class="d-lg-flex">
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Jackets & Coats</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Down Jackets</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Jackets</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Parkas</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Faux Leather Coats</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Trench</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Wool & Blends</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Vests & Waistcoats</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Leather Coats</a></li>
                                                      </ul>
                                                  </li>
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Suits & Blazers</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Blazers</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Suit Jackets</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Suit Pants</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Suits</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Vests</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Tailor-made Suits</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </li>
                                          <li class="mega-menu-col col-lg-5">
                                              <div class="header-banner2">
                                                  <img src="{{asset('assets/imgs/banner/menu-banner-4.jpg')}}" alt="menu_banner1">
                                                  <div class="banne_info">
                                                      <h6>10% Off</h6>
                                                      <h4>New Arrival</h4>
                                                      <a href="#">Shop now</a>
                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              <li class="has-children">
                                  <a href="#"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                  <div class="dropdown-menu">
                                      <ul class="mega-menu d-lg-flex">
                                          <li class="mega-menu-col col-lg-7">
                                              <ul class="d-lg-flex">
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Hot & Trending</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Cellphones</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">iPhones</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Refurbished Phones</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Mobile Phone Parts</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Phone Bags & Cases</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Communication Equipments</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Walkie Talkie</a></li>
                                                      </ul>
                                                  </li>
                                                  <li class="mega-menu-col col-lg-6">
                                                      <ul>
                                                          <li><span class="submenu-title">Accessories</span></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Screen Protectors</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Wire Chargers</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Wireless Chargers</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Car Chargers</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Power Bank</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Armbands</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Dust Plug</a></li>
                                                          <li><a class="dropdown-item nav-link nav_item" href="#">Signal Boosters</a></li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </li>
                                          <li class="mega-menu-col col-lg-5">
                                              <div class="header-banner2">
                                                  <img src="{{asset('assets/imgs/banner/menu-banner-5.jpg')}}" alt="menu_banner1">
                                                  <div class="banne_info">
                                                      <h6>10% Off</h6>
                                                      <h4>New Arrival</h4>
                                                      <a href="#">Shop now</a>
                                                  </div>
                                              </div>
                                              <div class="header-banner2">
                                                  <img src="{{asset('assets/imgs/banner/menu-banner-6.jpg')}}" alt="menu_banner2">
                                                  <div class="banne_info">
                                                      <h6>15% Off</h6>
                                                      <h4>Hot Deals</h4>
                                                      <a href="#">Shop now</a>
                                                  </div>
                                              </div>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                              <!--Foreach to show all categories -->
                                @foreach ($categories as $category)
                                    <li><a href="{{route('products.category', $category)}}"><i class="surfsidemedia-font-desktop"></i>{{$category->name}}</a></li>                         
                                @endforeach
                              <li>
                                  <ul class="more_slide_open" style="display: none;">
                                      <li><a href="#"><i class="surfsidemedia-font-desktop"></i>Beauty, Health</a></li>
                                      <li><a href="#"><i class="surfsidemedia-font-cpu"></i>Bags and Shoes</a></li>
                                      <li><a href="#"><i class="surfsidemedia-font-diamond"></i>Consumer Electronics</a></li>
                                      <li><a href="#"><i class="surfsidemedia-font-home"></i>Automobiles & Motorcycles</a></li>
                                  </ul>
                              </li>
                          </ul>
                          <div class="more_categories">Show more...</div>
                      </div>
                  </div>
                  <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                      <nav>
                          <ul>
                              <li><a class="active" href="/">Inicio </a></li>
                              <li><a href="{{url('about')}}">About</a></li>
                              <li><a href="{{url('shop')}}">Tienda</a></li>
                              <li class="position-static"><a href="#">Nuestras colecciones <i class="fi-rs-angle-down"></i></a>
                                  <ul class="mega-menu">
                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                      <a class="menu-title" href="#">Categorias</a>
                                      <!--Foreach to show all categories and their data -->
                                      @foreach ($categories as $category)
                                      <ul>  
                                          <li><a href="{{route('products.category', $category)}}">{{$category->name}}</a></li>
                                      </ul>
                                      @endforeach
                                      <li class="sub-mega-menu sub-mega-menu-width-22">
                                          <a class="menu-title" href="#">Etiquetas</a>
                                          @foreach ($tags as $tag)
                                          <ul>
                                            <li><a class="dropdown-item" href="{{route('products.tag', $tag)}}">{{$tag->name}}</a></li>
                                          </ul>
                                          @endforeach
                                      </li>
                                      <li class="sub-mega-menu sub-mega-menu-width-34">
                                          <div class="menu-banner-wrap">
                                              <a href="#"><img src="{{asset('assets/imgs/banner/menu-banner.jpg')}}" alt="Surfside Media"></a>
                                              <div class="menu-banner-content">
                                                  <h4>Hot deals</h4>
                                                  <h3>Don't miss<br> Trending</h3>
                                                  <div class="menu-banner-price">
                                                      <span class="new-price text-success">Save to 50%</span>
                                                  </div>
                                                  <div class="menu-banner-btn">
                                                      <a href="{{url('shop')}}">Shop now</a>
                                                  </div>
                                              </div>
                                              <div class="menu-banner-discount">
                                                  <h3>
                                                      <span>35%</span>
                                                      off
                                                  </h3>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </li>

                              {{--List of products--}}
                              <li class="position-static"><a href="#">Productos <i class="fi-rs-angle-down"></i></a>
                                <ul class="mega-menu">
                                  <li class="sub-mega-menu sub-mega-menu-width-22">
                                    <a class="menu-title" href="#">Productos populares</a>
                                    <ul>
                                      <li><a class="dropdown-item" href="{{route('shop.trending')}}">Productos Populares</a></li>
                                    </ul>
                    
                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                        <a class="menu-title" href="#">Nuevos productos</a>
                                        <ul>
                                          <li><a class="dropdown-item" href="{{route('shop.recents')}}">Nuevos Productos</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-mega-menu sub-mega-menu-width-34">
                                        <div class="menu-banner-wrap">
                                            <a href="#"><img src="{{asset('assets/imgs/banner/menu-banner.jpg')}}" alt="Surfside Media"></a>
                                            <div class="menu-banner-content">
                                                <h4>Hot deals</h4>
                                                <h3>Don't miss<br> Trending</h3>
                                                <div class="menu-banner-price">
                                                    <span class="new-price text-success">Save to 50%</span>
                                                </div>
                                                <div class="menu-banner-btn">
                                                    <a href="{{url('shop')}}">Shop now</a>
                                                </div>
                                            </div>
                                            <div class="menu-banner-discount">
                                                <h3>
                                                    <span>35%</span>
                                                    off
                                                </h3>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>        
                                                      
                              <li><a href="{{url('contact')}}">Contact</a></li>
                              @auth
                              <li><a href="#">Mi cuenta<i class="fi-rs-angle-down"></i></a>
                                  <ul class="sub-menu">
                                    
                                      <li><a href="{{url('my-orders')}}">Mis pedidos</a></li>
                                      @can('admin.home')
                                      <li><a href="{{route('admin.home')}}">Admin Panel</a></li>
                                      @endcan
                                      <li><a href="{{url('shop')}}">Productos</a></li>
                                   
                                      {{-- Accion de logout--}}
                                        <form id="logout-form"  action="{{ route('logout') }}" method="POST">
                                          @csrf
                                          <li><a href="{{ route('logout') }} "
                                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          
                                          {{ __('Cerrar Sesión') }}</a></li>
                                        </form>   
                                                                         
                                  </ul>
                              </li>
                                                               
                              @else     
                              
                            @endauth
                          </ul>
                      </nav>
                  </div>
              </div>

               <div class="d-none d-lg-block">
                  <p><i class="fi-rs-smartphone"></i><span>Llamanos</span> (+34) 123-456-789</p>
              </div> 

              <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
              <div class="header-action-right d-block d-lg-none">
                  <div class="header-action-2">
                     {{--Wishlist--}}
                     @livewire('shop.wish-list-icon-component')
                     {{--Cart--}}
                     @livewire('shop.cart-icon-component')
                      </div>

                      <div class="header-action-icon-2 d-block d-lg-none">
                          <div class="burger-icon burger-icon-white">
                              <span class="burger-icon-top"></span>
                              <span class="burger-icon-mid"></span>
                              <span class="burger-icon-bottom"></span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
  <div class="mobile-header-wrapper-inner">
      <div class="mobile-header-top">
          <div class="mobile-header-logo">
              <a href="/"><img src="{{asset('assets/imgs/logo/Mi proyecto2.png')}}" alt="logo"></a>
          </div>
          <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
              <button class="close-style search-close">
                  <i class="icon-top"></i>
                  <i class="icon-bottom"></i>
              </button>
          </div>
      </div>
      <div class="mobile-header-content-area">
          <div class="mobile-search search-style-3 mobile-header-border">
            <form action="{{url('searchproduct')}}" method="POST">
              @csrf
            <div class="input-group ml-3 mr-4 mt-2">
              <input type="search" id="search_product" name="product_name" placeholder="Search products" required aria-describedby="basic-addon1">
                <button type="submit"><i class="fi-rs-search"></i></button>
            </div>
           </form>
          </div>
          <div class="mobile-menu-wrap mobile-header-border">
              <div class="main-categori-wrap mobile-header-border">
                  <a class="categori-button-active-2" href="#">
                      <span class="fi-rs-apps"></span> Browse Categories
                  </a>
                  <div class="categori-dropdown-wrap categori-dropdown-active-small">
                      <ul>
                          <li><a href="#"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                          <li> <a href="#"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                          <li><a href="#"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                      </ul>
                  </div>
              </div>
              <!-- mobile menu start -->
              <nav>
                  <ul class="mobile-menu">
                      <li class="menu-item-has-children"><span class="menu-expand"></span><a href="/">Home</a></li>
                      <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">shop</a></li>
                      <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                          <ul class="dropdown">
                              <li class="menu-item-has-children"><span class="menu-expand"></span><a class="menu-title" href="#">Categorias</a>
                                  <ul class="dropdown">
                                    <!--Foreach to show all categories and their data -->
                                    @foreach ($categories as $category)
                                    <ul>  
                                        <li><a href="{{route('products.category', $category)}}">{{$category->name}}</a></li>
                                    </ul>
                                    @endforeach
                                  </ul>
                              </li>
                              
                              <li class="menu-item-has-children"><span class="menu-expand"></span><a class="menu-title" href="#">Etiquetas</a>
                                <ul class="dropdown">
                                  @foreach ($tags as $tag)
                                  <ul>  
                                      <li><a href="{{route('products.tag', $tag)}}">{{$tag->name}}</a></li>
                                  </ul>
                                  @endforeach
                                </ul>
                            </li>
                          </ul>
                      </li>
                      <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>
                      <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                          <ul class="dropdown">
                              <li><a href="#">English</a></li>
                              <li><a href="#">French</a></li>
                              <li><a href="#">German</a></li>
                              <li><a href="#">Spanish</a></li>
                          </ul>
                      </li>
                  </ul>
              </nav>
              
              <!-- mobile menu end -->
          </div>
          <div class="mobile-header-info-wrap mobile-header-border">
            @auth
              <div class="single-mobile-header-info mt-30">
                  <a href="{{url('contact')}}"> Contact </a>
              </div>
            
              <div class="single-mobile-header-info">
                  <a href="#">(+34) 123-456-789 </a>
              </div>

              @else
              <div class="single-mobile-header-info mt-30">
                <a href="{{url('contact')}}"> Contact </a>
              </div>

              <div class="single-mobile-header-info">
                <a href="{{route('login')}}">Log In </a>                        
              </div>

              <div class="single-mobile-header-info">                        
                  <a href="{{route('register')}}">Sign Up</a>
              </div>

              <div class="single-mobile-header-info">
                <a href="#">(+34) 123-456-789</a>
              </div>
              @endauth
          </div>
          <div class="mobile-social-icon">
              <h5 class="mb-15 text-grey-4">Follow Us</h5>            
              <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
              <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
              <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
              <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
              <a href="#"><img src="{{asset('assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
          </div>
      </div>
  </div>
</div>        

</style>


{{--Alert message--}}

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(session('status') == "No hay productos con ese nombre")
<script> 
Swal.fire({
  position: 'top-center',
  icon: 'error',
  title: '{{session('status')}}',
  showConfirmButton: false,
  timer: 2000
})
</script>

@endif
