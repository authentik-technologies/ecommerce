@extends('shop.layouts.master')
@section('shop')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> <a href="shop-grid-right.html">{{ $product['categories']['category_name'] }}</a> <span></span> {{ $product->product_name }}
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                @foreach ($multiImages as $image )
                                <figure class="border-radius-10">
                                    <img src="{{ asset($image->image_name) }}" alt="Image de produit - Plancher Laurentides" />
                                </figure>
                                @endforeach
                            </div>

                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                @foreach ($multiImages as $image )
                                <div><img src="{{ asset($image->image_name) }}" alt="Image de produit - Plancher Laurentides" /></div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">

                            @if ($product->product_qty > 0)
                            <span class="stock-status in-stock"> En stock </span>
                            @else
                            <span class="stock-status out-stock"> Hors Stock </span>
                            @endif
                            <h2 class="title-detail" id="pname">{{ $product->product_name }}</h2>
                            <div class="clearfix product-price-cover">
                                @php
                                $amount = $product->product_price - $product->product_discount;
                                $discount = ($amount/$product->product_price) * 100;
                                @endphp

                                @if($product->product_discount == NULL)
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">{{ $product->product_price }} $ / {{ $product->product_measurement }}</span>
                                </div>
                                @else
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">{{ $product->product_discount }} $ / {{ $product->product_measurement }}</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15">{{ round($discount)}} % Rabais</span>
                                        <span class="old-price font-md ml-15">{{ $product->product_price }} $ / {{ $product->product_measurement }}</span>
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{ $product->product_short_description }}</p>
                            </div>
                             <!-- @if ($product->product_size == NULL)

                            @else
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Dimensions: </strong>
                                <ul class="list-filter size-filter font-small" id="size">
                                    @foreach ( $product_size as $size )
                                    <li value="{{ $size }}"  style="border: 1px solid #ececec; border-radius: 5px"><a>{{ $size }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if ($product->product_color == NULL)

                            @else
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Couleur: </strong>
                                <ul class="list-filter size-filter font-small" id="size">
                                    @foreach ( $product_color as $color )
                                    <li value="{{ $color }}" style="border: 1px solid #ececec; border-radius: 5px"><a>{{ $color }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif -->
                            <label for="quantity">
                                <h6><i class="fi-rs-calculator"></i> Combien en avez-vous besoin?</h6>
                            </label>
                            <div class="detail-extralink mb-20">
                                <div class="detail-qty border radius">
                                    <input type="number" name="quantity" class="qty-val" id="qty" min="1" placeholder="Saisir la quantité">
                                </div>         
                                <div class="detail-measurement border radius">
                                    <input class="qty-val" style="background-color: white" placeholder="{{ $product->product_measurement }}" disabled>
                                </div>
                            </div>
                            <div class="short-desc mb-30" id="qty-text">
                                <h6>Combien en avez-vous besoin?</h6>
                            </div>
                            <div class="detail-extralink">
                                <div class="product-extra-link2 mb-20">
                                    <input type="hidden" id="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="button button-add-to-cart" onclick="addToCart()"><i class="fi-rs-shopping-cart"></i>Ajouter au panier</button>
                                </div>
                            </div>
                            <div class="detail-extralink mb-50">
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart" style="margin-top:0px ;background-color: white; border: 1px solid rgb(233, 1, 1); color: black"><i class="fi-rs-dollar"></i>Obtenez un devis</button>
                                </div>
                            </div>
                            <hr>
                            <div class="detail-extralink mb-50">
                                <div class="product-extra-link2">
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>

                            @if ($product->brand_id == NULL)
                            <h6>Vendu par: <span class="text-brand">Plancher Laurentides</span></h6>
                            <hr>
                            @else
                            <h6>Fabriqué par: <span class="text-brand">{{ $product['brands']['brand_name'] }}</span></h6>     
                            <hr>
                            @endif
                            <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    @if ($product->category_id == NULL)
                                    @else
                                    <li class="mb-5">Catégorie: <span class="text-brand">{{ $product['categories']['category_name'] }}</span></li>
                                    @endif

                                    @if ($product->subcategory_id == NULL)
                                    @else
                                    <li>Type: <span class="text-brand">{{ $product['subcategories']['subcategory_name'] }}</span></li>
                                    @endif
                                </ul>
                                <ul class="float-start">
                                    <li class="mb-5">SKU: 
                                        @if ($product->product_sku == NULL)

                                        @else
                                        <a rel="tag">{{ $product->product_sku }}  |  </a>
                                        @endif
                                    </li>
                                    
                                    <li class="mb-5">Tags: 
                                        @foreach ( $product_tag as $tag )
                                        @if ($tag == NULL)
                                        @else
                                        <a rel="tag">{{ $tag }} | </a>
                                        @endif
                                        
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Informations Supplémentaire</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                            </li> -->
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <div class=""> {!! $product->product_long_description !!} </div>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="length">
                                            <th>Longueur</th>
                                            <td>
                                                <p>{{ $product->product_length }}</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Largeur</th>
                                            <td>
                                                <p>{{ $product->product_width }}</p>
                                            </td>
                                        </tr>
                                        <tr class="height">
                                            <th>Épaisseur</th>
                                            <td>
                                                <p>{{ $product->product_height }}</p>
                                            </td>
                                        </tr>
                                        <tr class="weight">
                                            <th>Poids</th>
                                            <td>
                                                <p>{{ $product->product_weight }}</p>
                                            </td>
                                        </tr>
                                        
                                        <tr class="coverage">
                                            <th>Couverture</th>
                                            <td>
                                                <p>{{ $product->product_coverage }} pi² par {{ $product->product_measurement }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- start vendor
                            <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30">
                                    <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                    <div class="vendor-name ml-15">
                                        <h6>
                                            <a href="vendor-details-2.html">Noodles Co.</a>
                                        </h6>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                </ul>
                                <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">92%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div>
                                <p>Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.</p>
                            </div>
                            <div class="tab-pane fade" id="Reviews"> 
                            end vendor -->
                            
                                <!--Comments
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-2.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Sienna</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-3.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Brenna</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-4.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!--comment form
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <div class="product-rate d-inline-block mb-30"></div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Produits Similaire</h2>
                    </div>
                    <div class="col-12">
                        @foreach ($relatedProduct as $product )
                        <div class="row related-products"> 
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}" tabindex="0">
                                                <img class="default-img" src="{{ asset($product->product_thumbnail) }}" style="height: 180px" alt="" />
                                                <!-- <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" /> -->
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
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
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}" tabindex="0">{{ $product->product_name }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span> </span>
                                        </div>
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

