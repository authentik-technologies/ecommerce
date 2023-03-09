@extends('shop.layouts.master')
@section('head')
<meta charset="utf-8" />
    <title>403 - Accès Interdit</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="Plancher Laurentides 404 page" />
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

<main class="main page-404">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                    <p class="mb-20"><img src="{{ asset('shop/assets/imgs/page/page-404.png') }}" alt="" class="hover-up" /></p>
                    <h1 class="display-2 mb-30">Accès interdit</h1>
                    <p class="font-lg text-grey-700 mb-30">
                        Vous ne pouvez pas faire cette action.<br />
                        Visitez l'<a href="{{ url('/') }}"><span>Accueil</span></a> ou <a href="{{ url('/contactez-nous') }}"><span>Contact us</span></a> au sujet du problème.
                    </p>
                    <div class="search-form">
                            <form action="{{ route('shop.search') }}" method="POST">
                                @csrf
                                <input name="search" placeholder="Faites une recherche..." />
                                <button type="submit"><i class="fi-rs-search"></i></button>
                            </form>
                    </div>
                    <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="index.html"><i class="fi-rs-home mr-5"></i> Back To Home Page</a>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection