<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Inicio</a>                    
                <span></span> Términos y condiciones
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                            <h2>Términos y condiciones</h2>                                
                        </div>                            
                        <div class="single-content">
                            <p> Lea detenidamente estos Términos de servicio ("Términos", "Términos de servicio") antes de utilizar el sitio web https://tradevibes.in (el "Servicio") operado por TradeVibes ("nosotros", "nosotros", o “nuestro”).</p>                            <p>Su acceso y uso del Servicio está condicionado a su aceptación y cumplimiento de estos Términos. Estos Términos se aplican a todos los visitantes, usuarios y otras personas que acceden o utilizan el Servicio.</p>
                            <p>Al acceder o utilizar el Servicio, usted acepta estar sujeto a estos Términos. Si no está de acuerdo con alguna parte de los términos, no podrá acceder al Servicio.</p>
                            <h4>Derechos y restricciones</h4>
                            <ol>
                                <li>Los miembros deben tener al menos 18 años de edad.</li>
                                <li>A los miembros se les otorga un derecho por tiempo limitado, no exclusivo, revocable, intransferible y no sublicenciable para acceder a la parte del curso en línea correspondiente a la compra.</li>
                                <li>La parte del curso en línea correspondiente a la compra estará disponible para el Miembro siempre que la Compañía mantenga el curso, que será un mínimo de un año después de la compra del Miembro.</li>                                
                                <li>The videos in the course are provided as a video stream and are not downloadable.</li>
                                <li>Al aceptar otorgar dicho acceso, la Compañía no se obliga a mantener el curso ni a mantenerlo en su forma actual.</li>
                            </ol>

                            <h4>Enlaces a otros sitios web</h4>
                            <p>Nuestro Servicio puede contener enlaces a sitios web o servicios de terceros que no son propiedad ni están controlados por Surfside Media.</p>
                            <p>Surfside Media no tiene control ni asume ninguna responsabilidad por el contenido, las políticas de privacidad o las prácticas de los sitios web o servicios de terceros. Además, reconoce y acepta que Surfside Media no será responsable, directa o indirectamente, de ningún daño o pérdida causada o presuntamente causada por o en relación con el uso o la confianza en dicho contenido, bienes o servicios disponibles en o a través de tales sitios web o servicios.</p>                            
                            <p>Le recomendamos encarecidamente que lea los términos y condiciones y las políticas de privacidad de cualquier sitio web o servicio de terceros que visite.</p>
                            <h4>Terminación</h4>
                            <p>Podemos rescindir o suspender el acceso a nuestro Servicio de inmediato, sin previo aviso ni responsabilidad, por cualquier motivo, incluido, entre otros, si incumple los Términos.</p>                            
                            <p>Todas las disposiciones de los Términos que, por su naturaleza, deban sobrevivir a la rescisión, sobrevivirán a la rescisión, incluidas, entre otras, las disposiciones de propiedad, las exenciones de garantía, la indemnización y las limitaciones de responsabilidad.</p>                            <h4>Ley aplicable</h4>
                            <p>Estos Términos se regirán e interpretarán de conformidad con las leyes de Vietnam, sin tener en cuenta sus disposiciones sobre conflicto de leyes.</p>                            
                            <p>El hecho de que no hagamos valer cualquier derecho o disposición de estos Términos no se considerará una renuncia a esos derechos. Si alguna disposición de estos Términos se considera inválida o inaplicable por un tribunal, las disposiciones restantes de estos Términos permanecerán en vigor. Estos Términos constituyen el acuerdo completo entre nosotros con respecto a nuestro Servicio, y sustituyen y reemplazan cualquier acuerdo anterior que podamos tener entre nosotros con respecto al Servicio.</p>                            
                            <h4>Cambios</h4>
                            <p>Nos reservamos el derecho, a nuestro exclusivo criterio, de modificar o reemplazar estos Términos en cualquier momento. Si una revisión es material, intentaremos proporcionar un aviso de al menos 30 días antes de que entren en vigencia los nuevos términos. Lo que constituye un cambio material se determinará a nuestro exclusivo criterio.</p>                            <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
                            <h4>Contactanos</h4>
                            <p>Si tiene alguna pregunta sobre estos Términos, <a href="{{url('contact')}}">póngase en contacto con nosotros</a>.</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search…">
                                    <button type="submit"> <i class="fi-rs-search"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-40">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Categorias</h5>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                @foreach ($categories as $category)
                                    <ul class="categories">       
                                        <li class="cat-item cat-item-2"><a href="{{route('products.category', $category)}}">{{$category->name}}</a></li>
                                        
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Popular ahora</h5>
                            </div>
                            <div class="row">    
                                <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                    @foreach ($products_news as $product_new)
                                    <div class="single-post clearfix">
                                        <div class="image">
                                        <a href="{{route('publicaciones.show',$product_new)}}">
                                            <img class="default-img" src="@if($product_new->product_image) {{asset('storage/products/'. $product_new->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" alt="">
                                        </a>
                                        </div>
                                        <div class="content pt-10">
                                            <h5><a href="{{route('publicaciones.show',$product_new)}}">{{$product_new->name}}</a></h5>
                                            <p class="price mb-0 mt-5">{{$product_new->price}} €</p>
                                            <div class="product-rate">
                                                <div class="product-rating" style="width:90%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>                    
                            </div>
                        </div>
                        <!--Widget ads-->
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
                            <img src="assets/imgs/banner/banner-11.jpg" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="{{url('shop')}}">Comprar ahora <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                        <!--Widget Tags-->
                        <div class="sidebar-widget widget_tags mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Etiquetas</h5>
                            </div>
                            {{--Tags--}}
                            <div class="tagcloud">
                                @foreach ($tags as $tag)
                                <a class="tag-cloud-link" href="{{route('products.tag', $tag)}}">{{$tag->name}}</a>                              
                                @endforeach
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>