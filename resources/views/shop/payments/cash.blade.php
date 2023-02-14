@extends('shop.layouts.master')
@section('head')
<meta charset="utf-8" />
    <title>Confirmation de Commande - Plancher Laurentides</title>
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
            <span></span> <a href="{{ url('/commander') }}" rel="nofollow"><i class="fi-rs-card mr-5"></i>Commande</a>
            <span></span> Paiement
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Paiement par Carte de Crédit</h1>
            <div class="d-flex justify-content-between">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Votre commande</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            
                            <tr>
                                <td class="image product-thumbnail"><img src="" style="width:80px; height:80px;" alt="Plancher Qualité"></td>
                                <td>
                                    <span class="w-160 mb-5"></span>
                                    <!-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div> -->
                                </td>
                                <td>
                                    <h6 class="text-muted pl-20 pr-20"></h6>
                                </td>
                                <td>
                                    <h4 class="text-brand"></h4>
                                </td>
                            </tr>
                           
                            
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Sous-total</h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">TPS/TVQ (14.975%)</h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Confirmation de paiement</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            
                            <tr>
                                <td class="image product-thumbnail">
                                    <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-visa.svg') }}" alt="">
                                    <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-master.svg') }}" alt="">
                                </td>
                                <td>
                                    <span class="w-160 mb-5"></span>
                                    <!-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div> -->
                                </td>
                                <td>
                                    <h6 class="text-muted pl-20 pr-20"></h6>
                                </td>
                                <td>
                                    <h4 class="text-brand"></h4>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted"></h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted"></h6>
                                </td>     
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted"></h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection