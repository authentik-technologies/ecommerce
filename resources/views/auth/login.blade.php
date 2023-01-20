@extends('shop.layouts.master')
@section('shop')

<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> Connexion
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{ asset('shop/assets/imgs/page/login.webp') }}" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Identification</h1>
                                    <p class="mb-30">Pas de compte? <a href="{{ url('/register') }}">Inscrivez-vous</a></p>
                                </div>
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" required="" id="email" name="email" placeholder="Votre courriel *" />
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" id="password" name="password" placeholder="Votre mot de passe*" />
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="login_footer form-group mb-50">
                                        <a class="text-muted" href="{{ route('password.request') }}">Mot de passe oublié?</a>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Connexion</button>
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
@endsection