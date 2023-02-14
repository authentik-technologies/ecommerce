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
            <span></span> Mon compte
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Inscription - <br> Création de compte</h1>
                                    <p class="mb-30">Vous avez déjà un compte ? <a href="{{ route('login') }}">S'indentifier</a></p>
                                </div>
                                <form method="post" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" id="name" name="name" placeholder="Nom Complet" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required="" id="email" name="email" placeholder="Courriel" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required="" id="password" name="password" placeholder="Mot de passe" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required="" id="password_confirmation" name="password_confirmation" placeholder="Confirmer mot de passe" />
                                    </div>
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                <label class="form-check-label" for="exampleCheckbox12"><span>J'accepte les conditions et la politique.</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="#">En savoir plus</a>
                                    </div>
                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">S'inscrire</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note: </strong>Vos données personnelles seront utilisées pour faciliter votre expérience sur ce site web, pour gérer l'accès à votre compte et à d'autres fins décrites dans notre politique de confidentialité.</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection