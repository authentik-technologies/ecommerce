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
                <section class="row align-items-end mb-50">
                    <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                        <h4 class="mb-20 text-brand">How can help you ?</h4>
                        <h1 class="mb-30">Let us know how we can help you</h1>
                        <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <h5 class="mb-20">01. Visit Feedback</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <h5 class="mb-20">02. Employer Services</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <h5 class="mb-20 text-brand">03. Billing Inquiries</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="mb-20">04.General Inquiries</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="container mb-50 d-none d-md-block">
        <div class="border-radius-15 overflow-hidden">
            <div id="map-panes" class="leaflet-map"></div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="mb-50">
                    <div class="row mb-60">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h4 class="mb-15 text-brand">Office</h4>
                            205 North Michigan Avenue, Suite 810<br />
                            Chicago, 60601, USA<br />
                            <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                            <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                            <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <h4 class="mb-15 text-brand">Studio</h4>
                            205 North Michigan Avenue, Suite 810<br />
                            Chicago, 60601, USA<br />
                            <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                            <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                            <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-15 text-brand">Shop</h4>
                            205 North Michigan Avenue, Suite 810<br />
                            Chicago, 60601, USA<br />
                            <abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
                            <abbr title="Email">Email: </abbr>contact@Evara.com<br />
                            <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="contact-from-area padding-20-row-col">
                                <h5 class="text-brand mb-10">Formulaire de contact</h5>
                                <h2 class="mb-10">Écrivez-nous</h2>
                                <p class="text-muted mb-30 font-sm">Les champs obligatoires sont marqués d'un *.</p>
                                <form class="contact-form-style mt-30" id="myForm" action="{{ route('contact.save') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="name" name="name" placeholder="Votre nom" type="text" class="form-control" required/>        
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="email" name="email" placeholder="Courriel" type="email" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="phone" name="phone" placeholder="Numéro de téléphone" type="tel" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="subject" name="subject" placeholder="Sujet" type="text" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="textarea-style mb-30">
                                                <textarea id="message" name="message" placeholder="Message" class="form-control" style="height: 120px" required></textarea>
                                            </div>
                                            <input style="display: inline-block;
                                            font-size: 18px;
                                            font-weight: 700;
                                            padding: 12px 30px;
                                            border-radius: 4px;
                                            color: rgb(255, 255, 255);
                                            border: 1px solid transparent;
                                            background-color: rgb(233, 1, 1);
                                            width: 200px;
                                            height: 50px;
                                            cursor: pointer;
                                            transition: all 300ms linear 0s;
                                            letter-spacing: 0.5px;" class="submit submit-auto-width" 
                                            name="send" type="submit"></input>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 pl-50 d-lg-block d-none">
                            <img class="border-radius-15 mt-50" src="assets/imgs/page/contact-2.png" alt="" />
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


@endsection