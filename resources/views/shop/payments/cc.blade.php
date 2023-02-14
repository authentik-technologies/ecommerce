@extends('shop.layouts.master')
@section('head')
<meta charset="utf-8" />
    <title>Confirmation de Commande - Plancher Laurentides</title>
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

    <script src="https://js.stripe.com/v3/"></script>
     
@endsection
@section('shop')

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Accueil</a>
            <span></span> <a href="{{ url('/commander') }}" rel="nofollow"><i class="fi-rs-card mr-5"></i>Commande</a>
            <span></span> Paiement
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Paiement par Carte de Crédit</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Votre commande</h4>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="table-responsive order_table checkout">
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Sous-total</h6>
                                </td>
                                <td>
                                    <h5 class="text-brand text-end">{{ $cartSubTotal }} $</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">TPS/TVQ (14.975%)</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end">{{ $cartTax }} $</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end">{{ $cartTotal }} $</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="border p-40 cart-totals ml-30 mb-50">
                <div class="d-flex align-items-end justify-content-between mb-30">
                    <h4>Confirmation de paiement</h4> 
                </div>
                <br>
                <form action="{{ route('shop.stripe') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <label for="card-element">
                            <input type="hidden" name="name" value="{{ $data['name'] }}">
                            <input type="hidden" name="email" value="{{ $data['email'] }}">                  
                            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                            <input type="hidden" name="billing_cname" value="{{ $data['billing_cname'] }}">
                            <input type="hidden" name="billing_address" value="{{ $data['billing_address'] }}">
                            <input type="hidden" name="billing_unit" value="{{ $data['billing_unit'] }}">
                            <input type="hidden" name="billing_province" value="{{ $data['billing_province'] }}">
                            <input type="hidden" name="billing_city" value="{{ $data['billing_city'] }}">
                            <input type="hidden" name="billing_postal" value="{{ $data['billing_postal'] }}">
                            <input type="hidden" name="shipping_name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="shipping_cname" value="{{ $data['shipping_cname'] }}">
                            <input type="hidden" name="shipping_province" value="{{ $data['shipping_province'] }}">
                            <input type="hidden" name="shipping_address" value="{{ $data['shipping_address'] }}">
                            <input type="hidden" name="shipping_unit" value="{{ $data['shipping_unit'] }}">
                            <input type="hidden" name="shipping_city" value="{{ $data['shipping_city'] }}">
                            <input type="hidden" name="shipping_postal" value="{{ $data['shipping_postal'] }}">
                            <input type="hidden" name="sub_amount" value="{{ $cartSubTotal }}">
                            <input type="hidden" name="amount_tax" id="cartTax" value="{{ $cartTax }}">
                        </label>
                        <div id="card-element">
                        <!-- CC Form element is here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Effectuer le paiement</button>
                </form>
                <br>
                    <div class="d-flex align-items-end">
                        <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-visa.svg') }}" style="width:80px;" alt="Visa payment">
                        <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/payment-master.svg') }}" style="width:65px;" alt="Mastercard payment">
                        <img class="mr-15" src="{{ asset('shop/assets/imgs/theme/icons/secure.png') }}" style="width:90px;" alt="Secure Payment">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
// Create a Stripe client.
var stripe = Stripe('pk_test_51IcGPHCviSSQY4SQKU6i5Gw5YkI8bWnLaQcF7nMTk1EbNENwG5nJPRkUc21OkBxWsw8fKzxLRAVbO9cUfUQ7M0A800ukfYgs16');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
base: {
color: '#32325d',
fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
fontSmoothing: 'antialiased',
fontSize: '16px',
'::placeholder': {
color: '#aab7c4'
}
},
invalid: {
color: '#fa755a',
iconColor: '#fa755a'
}
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
displayError.textContent = event.error.message;
} else {
displayError.textContent = '';
}
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
event.preventDefault();
stripe.createToken(card).then(function(result) {
if (result.error) {
// Inform the user if there was an error.
var errorElement = document.getElementById('card-errors');
errorElement.textContent = result.error.message;
} else {
// Send the token to your server.
stripeTokenHandler(result.token);
}
});
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
// Insert the token ID into the form so it gets submitted to the server
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);
// Submit the form
form.submit();
}
</script>

@endsection