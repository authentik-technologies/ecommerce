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
            <span></span> À Propos
        </div>
    </div>
</div>

<div class="page-content pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="row align-items-center mb-50">
                    <div class="col-lg-6">
                        <img src="{{ ('shop/assets/imgs/page/a-propos.webp') }}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4">
                    </div>
                    <div class="col-lg-6">
                        <div class="pl-25">
                            <h2 class="mb-30">Plancher Laurentides</h2>
                            <h3 class="mb-30" style="color:#e90101">Produit de haute qualité</h3>
                            <p class="mb-25">Nous avons développé une approche afin de propulser le commerce du plancher à un autre niveau. Simplifier la vie du client, de l’entrepreneur et de l’auto constructeur. Satisfaire la clientèle. Nos experts en revêtement sont à votre service et prêts à vous aider.</p>
                            <div class="carausel-3-columns-cover position-relative">
                                <div id="carausel-3-columns-arrows"></div>
                                <div class="carausel-3-columns" id="carausel-3-columns">
                                    <img src="{{ asset('shop/assets/imgs/page/slide-1.webp') }}" alt="" />
                                    <img src="{{ asset('shop/assets/imgs/page/slide-2.webp') }}" alt="" />
                                    <img src="{{ asset('shop/assets/imgs/page/slide-3.webp') }}" alt="" />
                                    <img src="{{ asset('shop/assets/imgs/page/slide-4.webp') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="text-center mb-50">
                    <h2 class="title style-3 mb-40">Notre service inclut ce qui suit :</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-1.svg') }}" alt="">
                                <h4>Des produits de qualité</h4>
                                <p>Nos produits proviennent de fabricants renommés et sont sélectionnés spécialement pour vous.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-2.svg') }}" alt="">
                                <h4>Paiement en ligne sécurisé</h4>
                                <p>Notre plateforme de paiement en ligne est sécurisée. Nous ne stockons pas vos informations bancaires.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-3.svg') }}" alt="">
                                <h4>Des prix imbattables</h4>
                                <p>Nos produits sélectionnés sont à des prix imbattables. Contactez un de nos représentants aujourd'hui et voyez.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-4.svg') }}" alt="">
                                <h4>Satisfaction garantie</h4>
                                <p>Notre personnel est là pour vous. Tirez le meilleur parti de votre expérience grâce à un service clientèle de qualité.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-5.svg') }}" alt="">
                                <h4>Une expertise</h4>
                                <p>Les revêtements de sol sont notre spécialité. Soyez assurés que nous vous fournirons les meilleurs conseils et des produits de qualité.</p>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-24">
                            <div class="featured-card">
                                <img src="{{ asset('shop/assets/imgs/theme/icons/icon-6.svg') }}" alt="">
                                <h4>Compte client</h4>
                                <p>Access your customer account to view past orders, compare products, build a wishlist and view historical activities.</p>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="container mb-50 d-none d-md-block">
        <div class="row about-count">
            <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">
                <h1 class="heading-1"><span class="count">100</span>+</h1>
                <h4>Produits de qualités</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">3</span></h1>
                <h4>Emplacements</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">6</span>+</h1>
                <h4>Employées</h4>
            </div>
            <div class="col-lg-1-5 col-md-6 text-center">
                <h1 class="heading-1"><span class="count">150</span>+</h1>
                <h4>Commandes</h4>
            </div>
            <div class="col-lg-1-5 text-center d-none d-lg-block">
                <h1 class="heading-1"><span class="count">100</span>%</h1>
                <h4>Satisfaction client</h4>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="mb-50">
                    <div class="row">
                        <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                            <h6 class="mb-5 text-brand">Notre Équipe</h6>
                            <h1 class="mb-30">Expertise</h1>
                            <p class="mb-30">Notre mission est d’être constamment à l’affut des nouvelles dans le domaine du plancher. Notre mentalité a pour but de vous faciliter et simplifier l’achat de revêtement de sols. Nous sommes spécialisés dans le domaine, nos connaissance et dévouement sont incomparables.</p>
                            <p class="mb-30">Constamment à la recherche de nouvelles innovations, Plancher Laurentides vous réserve plusieurs surprises dans le futur..</p>
                            <!-- <a href="#" class="btn">View All Members</a> -->
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="team-card">
                                        <img src="{{ asset('shop/assets/imgs/page/david.webp') }}" alt="David Fradet - PL">
                                        <div class="content text-center">
                                            <h4 class="mb-5">David Fradet</h4>
                                            <span>Président &amp; Fondateur</span>
                                            <div class="social-network mt-20">
                                                <a href="https://www.facebook.com/PlancherLaurentides"><img src="{{ asset('shop/assets/imgs/theme/icons/social-fb.svg') }}" alt="Facebook Plancher Laurentides"></a>
                                                <a href="https://www.linkedin.com/company/plancher-laurentides"><img src="{{ asset('shop/assets/imgs/theme/icons/social-lki.svg') }}" alt="LinkedIn Plancher Laurentides"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


@endsection