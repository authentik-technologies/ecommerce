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
            <span></span> <a href="{{ url('/boutique') }}" rel="nofollow"><i class="fi-rs-shop mr-5"></i>Boutique</a>
            <span></span> Panier
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Votre panier d'achat</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">

                            </th>
                            <th scope="col" colspan="2">Produit</th>
                            <th scope="col">Prix</th> 
                            <th scope="col">Quantité</th>
                            <th scope="col">Sous-total</th>
                            <th scope="col" class="end">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id="cartpage">
                        
                    </tbody>
                </table>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="cart-action d-flex justify-content-between">
                <a href="{{ url('/boutique') }}" class="btn "><i class="fi-rs-arrow-left mr-10"></i>Boutique</a>
            </div>
            <!-- <div class="row mt-50">
                <div class="col-lg-7">
                    <div class="calculate-shiping p-40 border-radius-15 border">
                        <h4 class="mb-10">Calculate Shipping</h4>
                        <p class="mb-30"><span class="font-lg text-muted">Flat rate:</span><strong class="text-brand">5%</strong></p>
                        <form class="field_form shipping_calculator">
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <div class="custom_select">
                                        <select class="form-control select-active w-100">
                                            <option value="QC">Québec</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-lg-6">
                                    <input required="required" placeholder="State / Country" name="name" type="text">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required="required" placeholder="PostCode / ZIP" name="name" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                     <div class="p-40">
                        <h4 class="mb-10">Code promo</h4>
                        <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                        <form action="#">
                            <div class="d-flex justify-content-between">
                                <input class="font-medium mr-15 coupon" name="Coupon" placeholder="Enter Your Coupon">
                                <button class="btn"><i class="fi-rs-label mr-10"></i>Apply</button>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div>-->
        </div>
        <div class="col-lg-4">
            <div class="border p-md-4 cart-totals ml-30">
                <div class="table-responsive">
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Sous-total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end" id="cartSubTotal"></h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">TPS/TVQ (14.975%)</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end" id="cartTax"></h5>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" colspan="2">
                                    <div class="divider-2 mt-10 mb-10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Livraison</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h6 class="text-heading text-end">Secteur du Grand-Montréal</h6></td></tr> <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Frais de livraison</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h6 class="text-heading text-end">120.00$</h6</td> </tr> <tr>
                                <td scope="col" colspan="2">
                                    <div class="divider-2 mt-10 mb-10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end" id="cartTotal"></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('shop.checkout') }}" class="btn mb-20 w-100">Commander<i class="fi-rs-sign-out ml-15"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection