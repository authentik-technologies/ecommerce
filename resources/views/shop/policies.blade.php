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
            <span></span> Politiques
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
                                <h2>Politiques & Conditions d'utilisations</h2>
                            </div>
                            <h4>POLITIQUE DE REMBOURSEMENT</h4>
                            <br>
                            <ol start="1">
                                <li>Chez Plancher Laurentides Boutique en ligne, Si vous n’êtes pas satisfait de votre achat, nous serons heureux de vous <strong>échanger les produits sans frais</strong>.<br><br> Si votre achat ne convient pas suite à la commande, nous reprendrons la marchandise sans frais sur présentation de la facture originale. 
                                    Merci de retourner les produits en bonne condition et dans l’emballage d’origine. Aucun remboursement sur les plancher de bois.<br><br>
                                    Plancher Laurentides se réserve le droit de ne pas accepter un retour de produit dont l’emballage ou l’état général du produit est déficient. Nous pouvons <strong>rembourser la plupart des articles en surplus dans les 30 jours</strong> suivant la date d’achat indiquée sur votre facture.<br><br>
                                   <strong>Les conditions de la politique de retour peuvent être modifiées sans préavis.</strong></li><br><br>
                            </ol>
                            <h4>POLITIQUE DE CONFIDENTIALITÉ</h4>
                            <br>
                            <ol start="2">
                                <li>https://www.plancherlaurentides.com<br>
                                    Plancher Laurentides INC.<br>
                                    Type de site: Commerce en ligne (e-commerce).<br><br>
                                    <h6><strong>Le but de cette politique de confidentialité</strong>.</h6><br>
                                    Le but de cette politique de confidentialité est d’informer les utilisateurs de notre site des données personnelles que nous recueillerons ainsi que les informations suivantes, le cas échéant :<br><br>
                                    1. Les données personnelles que nous recueillerons<br>
                                    2. L’utilisation des données recueillies<br>
                                    3. Qui a accès aux données recueillies<br>
                                    4. Les droits des utilisateurs du site<br>
                                    5. La politique de cookies du site <br><br>
                                    Cette politique de confidentialité fonctionne parallèlement aux conditions générales d’utilisation de notre site.<br><br>
                                </li>
                            </ol>
                            <h4>LOIS APPLICABLES</h4>
                            <br>
                            <ol start="3">
                                <li>Cette politique est conforme aux lois énoncées dans la loi sur la protection des renseignements personnels et les documents électroniques (LPRPDE).<br><br> 
                                    Pour les résidents des pays de l’UE, le Règlement général sur la protection des données (RGDP) régit toutes les politiques de protection des données, quel que soit l’endroit où se trouve le site. La présente politique de confidentialité vise à se conformer au RGDP. 
                                    S’il y a des incohérences entre la présente politique et le RGDP, le RGDP s’appliquera. <br><br>
                                    Pour les résidents de l’État de Californie, cette politique de confidentialité vise à se conformer à la California Consumer Privacy Act (CCPA). 
                                    S’il y a des incohérences entre ce document et la CCPA, la législation de l’État s’appliquera. Si nous constatons des incohérences, nous modifierons notre politique pour nous conformer à la loi pertinente.
                                   </li><br><br>
                            </ol>
                            <h4>CONSENTEMENT</h4>
                            <br>
                            <ol start="4">
                                <li>Cette politique est conforme aux lois énoncées dans la loi sur la protection des renseignements personnels et les documents électroniques (LPRPDE).<br><br> 
                                    Pour les résidents des pays de l’UE, le Règlement général sur la protection des données (RGDP) régit toutes les politiques de protection des données, quel que soit l’endroit où se trouve le site. La présente politique de confidentialité vise à se conformer au RGDP. 
                                    S’il y a des incohérences entre la présente politique et le RGDP, le RGDP s’appliquera. <br><br>
                                    Pour les résidents de l’État de Californie, cette politique de confidentialité vise à se conformer à la California Consumer Privacy Act (CCPA). 
                                    S’il y a des incohérences entre ce document et la CCPA, la législation de l’État s’appliquera. Si nous constatons des incohérences, nous modifierons notre politique pour nous conformer à la loi pertinente.
                                   </li><br><br>
                            </ol>
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