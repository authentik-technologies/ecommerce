<!doctype html>
<html lang="fr_CA">
   
<head>
    @yield('head')
</head>

<body>
        
        <!--Main Content-->
		<main class="main">
			@yield('shop')
        </main>
 
        <!-- Template  JS -->
        <script src="{{ asset('shop/assets/js/main.js?v=5.6') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>

</html>