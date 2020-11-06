<div class="might-like-section" style="background:#ffffff">
    <div class="container">
        <h2 style="font-weight: normal;"><strong style="color:#171260">Productos que te pueden interesar!!!</strong></h2>
        <div class="row mx-auto my-auto">
                    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner w-100" role="listbox">
                            <div class="carousel-item active">
                              <div class="col-md-3S mb-2 text-center" >
                                  <a href="{{ route('shop.show', $productone->slug) }}"><img class="img-fluid" src="{{ productImage($productone->image) }}" alt="productalt"></a>
                                  <div class="might-like-product-name">{{ $productone->name }}</div>
                                  <div class="might-like-product-price">{{ $productone->presentPrice() }}</div>
                              </div>
                            </div>
                        @foreach($mightAlsoLike as $product)
                        <div class="carousel-item">
                            <div class="col-md-3S mb-2 text-center">
                                <a href="{{ route('shop.show', $product->slug) }}"><img class="img-fluid" src="{{ productImage($product->image) }}" alt="product"></a>
                                <div class="might-like-product-name">{{ $product->name }}</div>
                                <div class="might-like-product-price">{{ $product->presentPrice() }}</div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

    </div>
</div>
<style>
  .col-md-3S{
    flex: 0 0 20%;
    max-width: 20%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    background-color: transparent;
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.05); */
}
.col-md-3S:hover{
    /* box-shadow: 0 4px 8px 0 rgba(255, 183, 0, 1); */
    border: 2px solid #ffb700;
}
@media (max-width: 768px) {
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(33.33%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-33.33%);
    }
    .col-md-3S{
      flex: 0 0 33.33%;
    max-width: 33.33%;
  
}
}

.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
    display: flex;
}

/* display 3 */
@media (min-width: 768px) {
    
    .carousel-inner .carousel-item-right.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(20%);
    }
    
    .carousel-inner .carousel-item-left.active, 
    .carousel-inner .carousel-item-prev {
      transform: translateX(-20%);
    }
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left{ 
  transform: translateX(0);
}


</style>
<script>
$('#recipeCarousel').carousel({
  interval: 3000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 10;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
});



</script>
