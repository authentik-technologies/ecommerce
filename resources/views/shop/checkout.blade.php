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
            <span></span> Commander
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Placer votre commande</h1>
            <div class="d-flex justify-content-between">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="row">
                <h4 class="mb-30">Détails de facturation</h4>
                <form method="post" action="{{ route('checkout.save') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" required="" name="name" placeholder="Nom complet *" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input required="" type="email" name="email" placeholder="Courriel *" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="billing_cname" placeholder="Nom de compagnie" value="{{ Auth::user()->billing_cname }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" name="billing_address" required="" placeholder="Adresse *" value="{{ Auth::user()->billing_address }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" name="billing_unit" required="" placeholder="Unité / App / Bureau" value="{{ Auth::user()->billing_unit }}">
                        </div>
                    </div>
                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select class="form-control select-active" name="billing_province">
                                    <option value="QC">Québec</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="billing_city" placeholder="Ville *" value="{{ Auth::user()->billing_city }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="billing_postal" placeholder="Code postal *" value="{{ Auth::user()->billing_postal }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="phone" placeholder="Téléphone *" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>

                    <div class="ship_detail">
                        <h4 class="mb-30">Détails de livraison</h4>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" required="" name="shipping_name" placeholder="Nom complet *" value="{{ Auth::user()->shipping_name }}">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="shipping_cname" placeholder="Nom de compagnie" value="{{ Auth::user()->shipping_cname }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="custom_select w-100">
                                        <select class="form-control select-active" name="shipping_province">
                                            <option value="QC">Québec</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="shipping_address" required="" placeholder="Adresse *" value="{{ Auth::user()->shipping_address }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="shipping_unit" required="" placeholder="Unité / App / Bureau" value="{{ Auth::user()->shipping_unit }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="shipping_city" placeholder="Ville *" value="{{ Auth::user()->shipping_city }}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input required="" type="text" name="shipping_postal" placeholder="Code postale *" value="{{ Auth::user()->shipping_postal }}">
                                </div> 
                            </div>
                        
                    </div>
                
            </div>
        </div>
        <div class="col-lg-5">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Votre commande</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            @foreach ( $cartContent as $item )
                            <tr>
                                <td class="image product-thumbnail"><img src="{{ asset($item->options->image) }}" style="width:80px; height:80px;" alt="Plancher Qualité"></td>
                                <td>
                                    <span class="w-160 mb-5">{{ $item->name }}</span>
                                    <!-- <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div> -->
                                </td>
                                <td>
                                    <h6 class="text-muted pl-20 pr-20">{{ $item->qty }}</h6>
                                </td>
                                <td>
                                    <h4 class="text-brand">{{ $item->subtotal }} $</h4>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Sous-total</h6>
                                </td>
                                <td>
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
            </div>
            <div class="payment ml-30">
                <h4 class="mb-30">Paiements</h4>
                <div class="payment_option">
                    <div class="custome-radio">
                        <input class="form-check-input" required="" type="radio" name="payment_option" value="stripe" id="ccPayment" checked="">
                        <label class="form-check-label" for="ccPayment" data-bs-toggle="collapse" data-target="#ccPayment" aria-controls="ccPayment">Carte de crédit</label>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-visa.svg') }}" alt="">
                        <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-master.svg') }}" alt="">
                    </div>
                    <br>
                    @if(Auth::check() && Auth::user()->admin)
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" value="cash" id="diffPayment">
                            <label class="form-check-label" for="diffPayment" data-bs-toggle="collapse" data-target="#diffPayment" aria-controls="diffPayment">Paiement 30 jours</label>
                        </div>
                    @else        
                    @endif
                </div>
                <button type="submit" class="btn btn-fill-out btn-block mt-30">Placer ma commande<i class="fi-rs-sign-out ml-15"></i></a>
            </div>
        </div>
        </form>
    </div>
</div>


@endsection