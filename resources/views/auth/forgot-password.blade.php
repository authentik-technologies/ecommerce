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
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                <div class="login_wrap widget-taber-content background-white">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <img class="border-radius-15" src="{{ asset("shop/assets/imgs/page/forgot_password.svg") }}" alt="" />
                            <h2 class="mb-15 mt-15">Mot de passe oublié?</h2>
                            <p class="mb-30">Pas d'inquiétude, on vous tient ! Nous allons vous donner un nouveau mot de passe. Veuillez entrer votre adresse e-mail.</p>
                        </div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="post" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" id="email" name="email" placeholder="Votre courriel *" required autofocus/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Rénitialiser mon mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection