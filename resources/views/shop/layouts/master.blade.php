<!doctype html>
<html class="no-js" lang="en">
   
<head>
    <meta charset="utf-8" />
    <title>eCommerce</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" /
    >
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('shop/assets/imgs/theme/favicon.svg') }}"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/assets/css/main.css?v=5.3') }}"/>
    <link rel="stylesheet" href="{{ asset('shop/assets/css/plugins/slider-range.css') }}" />

    <!--leaflet map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    
</head>

    <body>
        <!--Modal-->

        <!--Quick View-->
		@include('shop.layouts.quickview')
		<!--end quickview -->

        <!--Header-->
		@include('shop.layouts.header')

        <!--Main Content-->
		<main class="main">
			@yield('shop')
        </main>

        <!--Footer-->
		@include('shop.layouts.footer')


        <!-- Vendor JS-->
        <script src="{{ asset('shop/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/slick.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/waypoints.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/wow.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/slider-range.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/magnific-popup.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/select2.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/counterup.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/images-loaded.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/isotope.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/scrollup.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/jquery.vticker-min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/leaflet.js') }}"></script>

        <!-- Template  JS -->
        <script src="{{ asset('shop/assets/js/main.js?v=5.3') }}"></script>
        <script src="{{ asset('shop/assets/js/shop.js?v=5.3') }}"></script>

        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="shop/assets/imgs/theme/loading.gif" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader End -->

    </body>

</html>