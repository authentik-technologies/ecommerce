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
        <script src="{{ asset('shop/assets/js/main.js?v=5.6') }}"></script>
        <script src="{{ asset('shop/assets/js/shop.js?v=5.6') }}"></script>

       

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
        <script type="text/javascript">

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
                        miniCart();
            
                        // console.log(data)
        
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
        
                    },
                    error: function(data) {
                    console.log("ERROR: ", data);
                    }
                }); 
            } // End add to cart function
        </script>

        <!-- MINI Cart Script -->
        <script type="text/javascript">

            // Mini cart function
            function miniCart(){
        
                $.ajax({
                    type: "GET",
                    dataType: 'JSON',
                    url: "/produits/details/minicart",
                    success:function(response){
                       // miniCart();
                       //  console.log(response)

                       $('#cartQty').text(response.cartQty);
                       $('#cartSubTotal').text(response.cartSubTotal);
                       $('#cartTax').text(response.cartTax);
                       $('#cartTotal').text(response.cartTotal);
                       var miniCart = ""

                       $.each(response.cartContent, function(key,value){
                        miniCart += `   <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a><img alt="Plancher Laurentides" src="/${value.options.image}" style="width: 60px; height:60px;"/></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h6>${value.name}</h6>
                                                    <h4><span>${value.qty} × </span>${value.price} $</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a type="submit" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <br>
                                    `
                       });

                       $('#miniCart').html(miniCart);
                    } 
                })
            } // End mini cart function
            miniCart();

            // Mini Cart Remove Function
            function minicartRemove(rowId){
                $.ajax({
                    type: "GET",
                    dataType: 'JSON',
                    url: "/produits/details/remove/"+rowId,
                    success:function(data){
                   // minicart(); // Executes the minicart method and refreshes the data from the datalisting

                        // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                            
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })

                        }else{
                        
                        Toast.fire({
                                type: 'error',
                                icon: 'error', 
                                title: data.error, 
                                })
                            } // End Message 
                        }
                });
            }
            
        </script>

        <!-- Cart Page  Script -->
        <script type="text/javascript">

            // Cart Page function
            function cart(){
        
                $.ajax({
                    type: "GET",
                    url: "/produits/details/panier",
                    dataType: 'json',
                    success:function(response){
                       // cart();
                       //console.log(response)

                       $('#cartQty2').text(response.cartQty);
                       $('#cartSubTotal').text(response.cartSubTotal);
                       $('#cartTax').text(response.cartTax);
                       $('#cartTotal').text(response.cartTotal);



                       var rows = ""

                       $.each(response.cartContent, function(key,value){
                            rows += `<tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="/${value.options.image}" style="width:60px; height60px;" alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="product-name mb-10 text-heading">${value.name}</h6> 
                                </td>
                                <td class="price" data-title="Prix">
                                    <h4 class="text-body">$${value.price} </h4>
                                </td>
                                <td class="text-center detail-info" data-title="Quantité">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius" style="max-width:100px;">  
                                        <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>                 
                                        <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                                        <a  type="submit" class="qty-up" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-title="Sous-total">
                                    <h4 class="text-brand">$${value.subtotal} </h4>
                                </td>
                                <td class="action text-center" data-title="Supprimer">
                                <a type="submit" class="text-body"  id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
                            </tr>`  
                       });

                       $('#cartpage').html(rows);
                    } 
                })
            } // End cart page function
            cart();

            // Cart Page Remove Function
            function cartRemove(rowId){
                $.ajax({
                    type: "GET",
                    dataType: 'JSON',
                    url: "/produits/details/remove/"+rowId,
                    success:function(data){
                   // minicart(); // Executes the minicart method and refreshes the data from the datalisting

                        // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                            
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })

                        }else{
                        
                        Toast.fire({
                                type: 'error',
                                icon: 'error', 
                                title: data.error, 
                                })
                            } // End Message 
                        },
                        error: function(data) {
                        console.log("ERROR: ", data);
                }
                });
            } // End cart page remove function
            
        </script>

        <!-- Add to wishlist Script -->
        <script type="text/javascript">

            function addToWishlist(product_id){
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: "/ajouter-aux-favoris/"+product_id,
                    success:function(data){
                        wishlist(); // Executes the wishlist method and refreshes the data from the datalisting


                        // Start Message 
                        const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000 
                            })
                            if ($.isEmptyObject(data.error)) {
                                    
                                    Toast.fire({
                                    type: 'success',
                                    icon: 'success', 
                                    title: data.success, 
                                    })
            
                                }else{
                                
                                Toast.fire({
                                        type: 'error',
                                        icon: 'error', 
                                        title: data.error, 
                                        })
                                    } // End Message 

                    }
                })
            }
        </script>

        <!-- wishlist Datalisting Script (in the wishlist page)-->
        <script type="text/javascript">

            function wishlist(){
                $.ajax({
                    type: "GET",
                    dataType: 'JSON',
                    url: "/get-wishlist-products/",

                    success:function(response){
                        

                        $('#wishQty').text(response.wishQty);
                        $('#wishQty-2').text(response.wishQty);
                        
                        var rows = ""
                        $.each(response.wishlist, function(key,value){

                            rows += `<tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                                
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thumbnail}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="">${value.product.product_name}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                ${value.product.product_discount == null
                                ? `<h3 class="text-brand">${value.product.product_price}</h3>`
                                :`<h3 class="text-brand">${value.product.product_discount}</h3>`
                                }
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty > 0
                                ? `<span class="stock-status in-stock mb-0"> En Stock </span>`
                                :`<span class="stock-status out-stock mb-0"> Hors Stock </span>`
                                } 
                            </td>
                            <td class="action text-center" data-title="Retirer">
                                <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>`
            });

            $('#wishlist').html(rows);
                            }
                        })
                    }

            wishlist(); // End Wishlist Datalisting function

        
            // Wishlist remove product from data listing
            function wishlistRemove(id){
                $.ajax({
                    type: "GET",
                    dataType: 'JSON',
                    url: "/remove-wishlist-products/"+id,

                    success:function(data){
                    wishlist(); // Executes the wishlist method and refreshes the data from the datalisting

                        // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                            
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })

                        }else{
                        
                        Toast.fire({
                                type: 'error',
                                icon: 'error', 
                                title: data.error, 
                                })
                            } // End Message 
                        }
                })
            }
        </script>

        <!-- Add to compare Script -->
        <script type="text/javascript">

            function addToCompare(product_id){
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: "/ajouter-pour-comparaison/"+product_id,
                    success:function(data){
                        // compare(); // Executes the wishlist method and refreshes the data from the datalisting

                        // Start Message 
                        const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000 
                            })
                        if ($.isEmptyObject(data.error)) {
                            
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })
    
                        }else{
                        
                        Toast.fire({
                                type: 'error',
                                icon: 'error', 
                                title: data.error, 
                                })
                            } // End Message 

                    }
                })
            }
        </script>

</body>

</html>