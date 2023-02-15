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

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> F.A.Q
        </div>
    </div>
</div>

<div class="page-content pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                            <div class="single-header style-2">
                                <h2>Questions les plus fréquemment posées</h2>
                            </div>
                            @foreach ($faqs as $faq )
                            <div class="single-content mb-50">
                                <h4>{{ $faq->question }}</h4>
                                <p>{{ $faq->answer }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Catégories</h5>
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
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Marques</h5>
                                <ul>
                                    @foreach($brands as $brand)
                                    @php
                                        $products = App\Models\Products::where('brand_id',$brand->id)->get();
                                    @endphp
                                    <li>
                                        <a href="{{ url('produits/marques/'.$brand->id.'/'.$brand->brand_slug) }}"> <img src="{{ asset($brand->brand_image) }}" alt="" />{{ $brand->brand_name }}</a><span class="count">{{ count($products) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection