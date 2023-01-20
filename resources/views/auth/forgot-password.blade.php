@extends('shop.layouts.master')
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