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
            <span></span> <a href="{{ url('/dashboard') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Mon Compte</a>
            <span></span> Détails
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.dashboard') }}"><i class="fi-rs-settings-sliders mr-10"></i>Tableau de bord</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.orders') }}"><i class="fi-rs-shopping-bag mr-10"></i>Commandes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.address') }}"><i class="fi-rs-marker mr-10"></i>Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('shop.account.details') }}"><i class="fi-rs-user mr-10"></i>Détails de compte</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.password') }}"><i class="fi-rs-key mr-10"></i>Mot de passe</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Détails de compte</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('user.profile.save') }}" name="enq">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Nom Complet<span class="required">*</span></label>
                                                    <input required="" class="form-control" name="name" type="text" value="{{ $userData->name }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Courriel <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="email" type="email" value="{{ $userData->email }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Téléphone <span class="required">*</span></label>
                                                    <input required="" class="form-control" name="phone" type="phone" value="{{ $userData->phone }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Site Web</label>
                                                    <input  class="form-control" name="website_url" type="text" value="{{ $userData->website_url }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Twitter</label>
                                                    <input  class="form-control" name="twitter_url" type="text" value="{{ $userData->twitter_url }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Facebook</label>
                                                    <input  class="form-control" name="facebook_url" type="text" value="{{ $userData->facebook_url }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Instagram</label>
                                                    <input  class="form-control" name="instagram_url" type="text" value="{{ $userData->instagram_url }}" />
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Mettre à jour</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
