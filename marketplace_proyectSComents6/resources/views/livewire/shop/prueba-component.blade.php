<style>
    @media (max-width:767px){
        .carousel-inner .carousel-item > div{
            display: none;
        }

        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }

    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev{
        display: flex;
    }

    @media (min-width:760px){
        .carousel-inner .carousel-item-end.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(25%);
        }

        .carousel-inner .carousel-item-start.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-25%);
        }
    }

    .carousel-inner .carousel-item-end,
    .carousel-inner .carousel-item-start {
        transform: translateX(0);
    }

</style>

<div class="container">
    <center>
 
        <div class="col-md-4">
            <form class="d-flex">
                <label for=""><b style="color:black; font-size: 25px" >Buscar:</b></label>
                <input class="form-control me-2" type="search" placeholder="Nombre del producto a buscar" aria-label="Search">
                <button class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i> </button>
            </form>
        </div>

    </center>
</div>
<div class="container" style="background-color:black; border-radius:10px">
    <h3 style="color:white; text-align:center" ><b>Los mas populares</b></h3>
        
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php $count = 0;?>
                    @foreach ($featured_products as $item)
                    <?php $count = $count + 1;
                    if($count == 1){ ?>
                        <div class="carousel-item active">
                            <div class="col-md-3 mr-4">
                                <div class="" style="color:white">
                                    <div class="card-img">
                                        <img src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5" alt="Card image cap">
                                    </div>
                                    <?php echo $count; ?>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="carousel-item">
                            <div class="col-md-3 mr-4">
                                <div class="" style="color:white">
                                    <div class="card-img">
                                        <img src="@if($item->product_image) {{asset('storage/products/'. $item->product_image)}} @else {{asset('img/default_product.jpg')}}  @endif" class="img-fluid ml-5" alt="Card image cap">
                                    </div>
                                    {{$item->id}}
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    

                    @endforeach

                    
                    




                </div>
                <a href="#recipeCarousel" role="button" data-bs-slide="prev" class="carousel-control-prev bg-transparent w-aut">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a href="#recipeCarousel" role="button" data-bs-slide="next" class="carousel-control-next bg-transparent w-aut">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
        
    

    </div>



<script>
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 5;
        let next = el.nextElementSibling;
        for(var i =1; i<minPerSlide; i++){
            if(!next){
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
        
    });
</script>