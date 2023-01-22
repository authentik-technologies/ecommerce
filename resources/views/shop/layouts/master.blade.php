<!doctype html>
<html lang="en">
   
<head>
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

</head>

<body>
        
        <!--Header-->
		@include('shop.layouts.header')

        <!--Main Content-->
		<main class="main">
			@yield('shop')
        </main>

        <!--Footer-->
		@include('shop.layouts.footer')

        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="{{ asset('shop/assets/imgs/theme/loading.gif') }}" alt="PL" />
                    </div>
                </div>
            </div>
        </div> <!-- Preloader End -->

        <!-- Vendor JS-->
        <script src="{{ asset('shop/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('shop/assets/js/plugins/slick.js') }}"></script>
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

       

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
            }
            @endif
        </script>
        
        <!-- Add to Cart Script -->
        <script>

            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            // Add to cart function
            function addToCart(){
        
                // alert()
        
                var product_name = $('#pname').text();
                var id = $('#product_id').val();
                var product_qty = $('#qty').val();
        
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: "/produits/details/add/"+id,
                    data:{
                        product_qty:product_qty, product_name:product_name, 
                    },
                    success:function(data){
                        // miniCart();
            
                        console.log(data)
        
                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success', 
                            showConfirmButton: false,
                            timer: 3000 
                        })
                        if ($.isEmptyObject(data.error)) {
                                
                                Toast.fire({
                                type: 'success',
                                title: data.success, 
                                })
        
                            }else{
                            
                            Toast.fire({
                                    type: 'error',
                                    title: data.error, 
                                    })
                                } // End Message 
        
                    }// End add to cart function
                });
            }
        </script>

</body>

</html>