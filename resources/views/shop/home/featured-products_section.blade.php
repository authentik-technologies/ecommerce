@php
    $featured = App\Models\Products::where('featured','on')->orderBy('id','DESC')->limit(6)->get();
@endphp

<!--Start Best Sales-->
<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Produits Vedettes </h3>
             
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100" style="color:rgb(255, 255, 255)">Magasinage dans le comfort de votre maison</h2>
                        <a href="" class="btn btn-xs">Voir plus <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                @foreach ( $featured as $product )
                                <div class="product-cart-wrap">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                                                <!-- <img class="hover-img" src="shop/assets/imgs/shop/product-1-2.jpg" alt="" /> -->
                                            </a>
                                        </div>
                                        @php
                                        $amount = $product->product_price - $product->product_discount;
                                        $discount = ($amount/$product->product_price) * 100;
                                        @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if ($product->product_discount == NULL)
                                            <span class="best">Meilleur Vendeur</span>
                                            @else
                                            <span class="sale">Rabais {{ round($discount) }} %</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product['categories']['category_name'] }}</a>
                                        </div>
                                        <h2><a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
                                        <!-- <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div> -->
                                        <div>
                                            @if ($product->brand_id == NULL)
                                            <span class="font-small text-muted">Par <a href="#">Plancher Laurentides</a></span>
                                            @else
                                            <span class="font-small text-muted">Par <a href="#">{{ $product['brands']['brand_name'] }}</a></span>
                                            @endif
                                        </div>
                                        <div class="product-card-bottom">
        
                                            @if ($product->product_discount == NULL)
                                            <div class="product-price">
                                                <span>{{ $product->product_price }} $ / {{ $product->product_measurement }}</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>{{ $product->product_discount }} $ / {{ $product->product_measurement }}</span>
                                                <span class="old-price">{{ $product->product_price }} $</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div> <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->

                   
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>
<!--End Best Sales-->