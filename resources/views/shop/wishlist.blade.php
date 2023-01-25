@extends('shop.layouts.master')
@section('shop')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> <a href="{{ url('/dashboard') }}" rel="nofollow">Mon compte</a> <span></span> Favoris
        </div>
    </div>
</div>

<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="mb-50">
                <h1 class="heading-2 mb-10">Vos favoris</h1>
                <h6 class="text-body">Vous-avez <span class="text-brand" id="wishQty-2"></span> produits enregistré.</h6>
            </div>
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                            </th>
                            <th scope="col" colspan="2">Produits</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="end">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody id="wishlist">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
