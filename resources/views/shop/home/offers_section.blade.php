@php
    $special_offers = App\Models\Products::where('special_offer','on')->where('product_discount','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
    $special_deals = App\Models\Products::where('special_deal','on')->where('product_discount','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
    $recently_added = App\Models\Products::orderBy('created_at','ASC')->limit(3)->get();
    $liquidation = App\Models\Products::orderBy('product_discount','ASC')->limit(3)->get();
@endphp

<!--Start 4 columns-->
<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Offres Spécial </h4>
                <div class="product-list-small animated animated">
                    @foreach ($special_offers as $product )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ ($product->product_name) }}</a>
                            </h6>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> -->
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
                    </article>
                    @endforeach
 
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Promotions </h4>
                <div class="product-list-small animated animated">
                    @foreach ($special_deals as $product )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ ($product->product_name) }}</a>
                            </h6>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> -->
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
                    </article>
                    @endforeach
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Nouveautés </h4>
                <div class="product-list-small animated animated">
                    @foreach ($recently_added as $product )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ ($product->product_name) }}</a>
                            </h6>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> -->
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
                    </article>
                    @endforeach
                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Liquidations </h4>
                <div class="product-list-small animated animated">
                    @foreach ($liquidation as $product )
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thumbnail) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ ($product->product_name) }}</a>
                            </h6>
                            <!-- <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div> -->
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
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End 4 columns-->