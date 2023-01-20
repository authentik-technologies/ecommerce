@php
    $products = App\Models\Products::where('product_status','active')->orderBy('id','ASC')->limit(10)->get();
    $categories = App\Models\Categories::orderBy('category_name','ASC')->get();
@endphp

<!--Start Products Tabs-->
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Nouveautés </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @foreach ( $categories as $category )
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $category->id }}" type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{ $category->category_name }}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">

                    @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">
                                        <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                                        <!-- <img class="hover-img" src="shop/assets/imgs/shop/product-1-2.jpg" alt="" /> -->
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="#"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="quickView(this.id)"><i class="fi-rs-eye"></i></a>                                </div>
                                @php
                                    $amount = $product->product_price - $product->product_discount;
                                    $discount = ($amount/$product->product_price) * 100;
                                @endphp
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->product_discount == NULL)
                                    <span class="hot">Nouveau</span>
                                    @else
                                     <span class="hot">Rabais {{ round($discount) }} %</span>
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
                                    
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Ajouter </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach <!--end product card-->             
                </div>
                <!--End product-grid-4-->
            </div>

            @foreach ($categories as $category )
            <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                @php
                $categoryProducts = App\Models\Products::where('category_id',$category->id)->orderBy('id','DESC')->get();
                @endphp

                @forelse ($categoryProducts as $product )
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">
                                    <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)" ><i class="fi-rs-eye"></i></a>
                            </div>
                            @php
                                $amount = $product->product_price - $product->product_discount;
                                $discount = ($amount/$product->product_price) * 100;
                            @endphp
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if ($product->product_discount == NULL)
                                <span class="hot">Nouveau</span>
                                @else
                                <span class="hot">Rabais {{ round($discount) }} %</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="shop-grid-right.html">{{ $product['categories']['category_name'] }}</a>
                            </div>
                            <h2><a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h2>
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
                                <div class="add-cart">
                                    <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Ajouter </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <h5 class="text-danger">Aucun produits trouvé</h5>

                @endforelse  
                </div> <!--End product-grid-4-->
            </div> <!--En tab two-->
            @endforeach
        </div> <!--End tab-content-->    
    </div> <!--End container--> 

</section> <!--End Products Tabs-->