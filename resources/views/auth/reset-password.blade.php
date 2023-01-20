@extends('shop.layouts.master')
@section('shop')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> Rénitialisation de mot de passe
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                <div class="row">
                    <div class="heading_s1">
                        <img class="border-radius-15" src="assets/imgs/page/reset_password.svg" alt="" />
                        <h2 class="mb-15 mt-15">Définir un nouveau mot de passe</h2>
                        <p class="mb-30">Veuillez créer un nouveau mot de passe que vous n'utilisez sur aucun autre site.</p>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <form method="post" action="{{ route('password.store') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="form-group">
                                        <label for="email" >Courriel</label>
                                        <input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirmer le mot de passe</label>
                                        <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Réinitialiser le mot de passe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-50">
                        <h6 class="mb-15">Le mot de passe doit :</h6>
                        <p>Comprend entre 8 et 16 caractères</p>
                        <p>Incluez au moins deux des éléments suivants :</p>
                        <ol class="list-insider">
                            <li>Un caractère majusculer</li>
                            <li>Un caractère minuscule</li>
                            <li>Un chiffre</li>
                            <li>Un caractère spécial</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection