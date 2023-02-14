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
            <span></span> Commandes
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
                                    <a class="nav-link active" href="{{ route('shop.account.orders') }}"><i class="fi-rs-shopping-bag mr-10"></i>Commandes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.address') }}"><i class="fi-rs-marker mr-10"></i>Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.account.details') }}"><i class="fi-rs-user mr-10"></i>Détails de compte</a>
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
                                        <h3 class="mb-0">Vos commandes</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="hidden">ID</th>
                                                        <th>Commande</th>
                                                        <th>Facture</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Paiement</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $key=>$order)
                                                    <tr>
                                                        <td class="hidden">{{ $key+1 }}</td>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td>{{ $order->invoice_no }}</td>
                                                        <td>{{ $order->order_date }}</td>
                                                        <td>{{ number_format($order->amount/100,2,".",",") }} $</td>
                                                        <td>{{ $order->payment_method }}</td>
                                                        <td>
                                                            @if($order->status == 'Pending')
                                                            <span class="badge badege-pill bg-warning">En cours</span>
                                                            @elseif ($order->status == 'Done')
                                                            <span class="badge badege-pill bg-sucess">Complété</span>
                                                            @elseif ($order->status == 'Cancelled')
                                                            <span class="badge badege-pill bg-danger">Cancellé</span>
                                                            @elseif ($order->status == 'Returned')
                                                            <span class="badge badege-pill bg-danger">Retourné</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('dashboard/account/orders/details/'.$order->id) }}" class="btn-sm btn-success"><img src="{{ asset('shop/assets/imgs/theme/icons/icon-invoice.svg') }}" style="width:16px; height:16px;" alt="invoice"/></a>
                                                            <!-- <a href="{{ url('dashboard/account/orders/download/'.$order->id) }}" class="btn-sm btn-info"><img src="{{ asset('shop/assets/imgs/theme/icons/icon-download.svg') }}" style="width:16px; height:16px;" alt="download"/></a> -->

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
</div>

@endsection
