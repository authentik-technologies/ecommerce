@extends('shop.layouts.master')
@section('head')
<meta charset="utf-8" />
    <title>Plancher Laurentides</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('shop/assets/imgs/theme/favicon.svg') }}"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/assets/css/main.css?v=5.3') }}"/>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" /> 
@endsection
@section('shop')

<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <h3 class="mb-15">Résultats pour {{ $item }}</h3>
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
                        <span></span><a href="{{ url('/boutique') }}">Boutique</a>
                        <span></span>{{ $item }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>Nous avons trouvés <strong class="text-brand">{{ count($products) }}</strong> produits pour vous!</p>
                </div>
                <!--
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Afficher:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">Tous</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Filtrer par:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                -->
            </div>

            
            <div class="row product-grid">
                @foreach ($products as $product)
                    <div class="col-lg-1-4 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
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
                                    <span class="new">Nouveau</span>
                                    @else
                                     <span class="sale">Rabais {{ round($discount) }} %</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">{{ $product['categories']['category_name'] }}</a>
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
                        </div>
                    </div>
                    @endforeach <!--end product card-->  
            </div>
        </div>

        <!-- SIDEBAR WIDGETS -->
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Category</h5>
                <ul>
                    @foreach($categories as $category)
                    @php
                        $products = App\Models\Products::where('category_id',$category->id)->get();
                    @endphp
                    <li>
                        <a href="{{ url('produits/categories/'.$category->id.'/'.$category->category_slug) }}"> <img src="{{ asset($category->category_image) }}" alt="" />{{ $category->category_name }}</a><span class="count">{{ count($products) }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">New products</h5>
                @foreach ($new_products as $product )
                <div class="single-post clearfix">
                    <div class="image">
                        <img src="{{ asset( $product->product_thumbnail ) }}" alt="#" />
                    </div>
                    <div class="content pt-10">
                        <p><a href="{{ url('produits/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></p>
                        @if ($product->product_discount == NULL)
                        <p class="price mb-0 mt-5">{{ $product->product_price }} $ / {{ $product->product_measurement }}</p>
                        @else
                        <p class="price mb-0 mt-5">{{ $product->product_discount }} $ / {{ $product->product_measurement }}</p>
                        <p class="old-price">{{ $product->product_price }} $</p>
                        @endif 
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection