<!DOCTYPE html>
<html class="no-js" lang="fr_CA">

<head>
    <meta charset="utf-8" />
    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('shop/assets/css/main.css?v=5.6') }}" />
</head>

<body>
    <div class="invoice invoice-content invoice-2">
        <div class="container">
            <div class="invoice-btn-section clearfix d-print-none">
                <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="shop/assets/imgs/theme/icons/icon-print.svg" alt="" /> Imprimer </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-numb">
                                            <h4 class="invoice-header-1 mb-10 mt-20"># Facture: <span class="text-brand"></span>{{ $order->invoice_no }}</h4>
                                            <h6 class="">Date: {{ $order->order_date }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-name text-end">
                                            <div class="logo">
                                                <a href="index.html"><img src="{{ asset('shop/assets/imgs/page/logo.webp') }}" style="width:120px;" alt="logo" /></a>
                                                <p class="text-sm text-mutted">2200 Boulevard Sainte-Sophie <br> SAINTE-SOPHIE QUEBEC J5J 2P5</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Livraison</h4>
                                            <p class="invoice-addr-1">
                                                <strong>{{ $order->shipping_cname }}</strong> <br/>
                                                {{ $order->shipping_name }}<br/>
                                                {{ $order->shipping_unit }} {{ $order->shipping_address }} {{ $order->shipping_province }} {{ $order->shipping_city }}<br/>
                                                {{ $order->shipping_postal }} 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Facturation</h4>
                                            <p class="invoice-addr-1">
                                                <strong>{{ $order->billing_cname }}</strong> <br/>
                                                {{ $order->name }}<br/>
                                                {{ $order->phone }}<br/>
                                                {{ $order->email }}<br/>
                                                {{ $order->shipping_unit }} {{ $order->shipping_address }} {{ $order->shipping_province }} {{ $order->shipping_city }}<br/>
                                                {{ $order->shipping_postal }} 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-3 col-md-6">
                                        <h4 class="invoice-title-1 mb-10">Méthode de paiement</h4>
                                        <p class="invoice-from-1">Carte de crédit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Produit</th>
                                                <th class="text-center">Prix</th>
                                                <th class="text-center">Quantité</th>
                                                <th class="text-right">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $orderItem as $item )
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{ $item->products->product_name }}</span>
                                                        @if ($item->products->brand_id == NULL)
                                                        <small>Plancher Laurentides</small>
                                                        @else
                                                        <small>{{ $item->products->brands->brand_name }}</small>                             
                                                        @endif  
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $item->price }} $</td>
                                                <td class="text-center">{{ $item->qty }}</td>
                                                <td class="text-right">{{ number_format($item->qty*$item->price, 2,".",",") }} $</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Sous-total</td>
                                                <td class="text-right">{{ number_format($order->sub_amount, 2,".",",") }} $</td>
                                            </tr>                                         
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">TPS(5%)</td>
                                                <td class="text-right">{{ number_format($order->sub_amount*0.05, 2,".",",") }} $</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">TVQ(9.975%)</td>
                                                <td class="text-right">{{ number_format($order->sub_amount*0.09975, 2,".",",") }} $</td>
                                            </tr>
                                            <tr>

                                                <td colspan="3" class="text-end f-w-600">Total</td>
                                                <td class="text-right f-w-600">{{ number_format($order->amount/100, 2,".",",") }} $</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <span>TPS: 123123123123123</span><br>
                                            <span>TVQ: 123123123123123123</span>
                                            <h3 class="invoice-title-1">Notes Importante</h3>
                                            <ul class="important-notes-list-1"> 
                                                <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
                                                <li>Once order done, money can't refund</li>
                                                <li>Delivery might delay due to some external dependency</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-offsite">
                                        <div class="text-end">
                                            <p class="mb-0 text-13">Merci de votre confiance</p>
                                            <p><strong>Plancher Laurentides</strong></p>
                                            <div class="mobile-social-icon mt-50 print-hide">
                                                <h6>Suivez-nous</h6>
                                                <a href="https://www.facebook.com/PlancherLaurentides/"><img src="{{ asset('shop/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="Facebook" /></a>
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
    <!-- Vendor JS-->
    <script src="{{ asset('shop/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('shop/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Invoice JS -->
    <script src="{{ asset('shop/assets/js/invoice/jspdf.min.js') }}"></script>
    <script src="{{ asset('shop/assets/js/invoice/invoice.js') }}"></script>
</body>

</html>