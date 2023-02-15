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
    <section class="container mb-50 d-none d-md-block">
        <div class="border-radius-15 overflow-hidden">
            <div class="leaflet-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.5429308753537!2d-73.89926981770158!3d45.820411523105065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc8d26164efca0f%3A0xbc15bba266837836!2s2200%20Boulevard%20Ste%20Sophie%2C%20Sainte-Sophie%2C%20QC%20J5J%202P5!5e0!3m2!1sfr!2sca!4v1676482837132!5m2!1sfr!2sca" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <section class="mb-50">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-from-area padding-20-row-col">
                                <h5 class="text-brand mb-10">Formulaire de contact</h5>
                                <h2 class="mb-10">Écrivez-nous</h2>
                                <p class="text-muted mb-30 font-sm">Les champs obligatoires sont marqués d'un *.</p>
                                <form class="contact-form-style mt-30" id="myForm" action="{{ route('contact.save') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="name" name="name" placeholder="Votre nom" type="text" class="form-control" required/>        
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="email" name="email" placeholder="Courriel" type="email" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="input-style mb-20">
                                                <input id="phone" name="phone" placeholder="Numéro de téléphone" type="tel" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
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