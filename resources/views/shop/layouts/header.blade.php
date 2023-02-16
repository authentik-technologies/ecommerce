<!-- Header  -->
<header class="header-area header-style-1 header-height-2">
    @php
    $setting = App\Models\Settings::find(1);    
    @endphp
    <div class="mobile-promotion">
        <span><strong>{{ $setting->messages }}</strong></span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="mailto:{{ $setting->email }}">Support</a></li>
                            <li><a href="{{ url('/faq') }}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <ul>
                            <li><strong>{{ $setting->messages }}</strong></li>
                        </ul>
                        <!-- <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>messages here</li>
                                <li>messages here</li>
                                <li>messages here</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                           
                            <li>
                                <a class="language-dropdown-active" href="#">Français <i class=""></i></a>
                                <!--<ul class="language-dropdown">
                                    <li>
                                        <a href="#">English</a>
                                    </li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ url('/') }}" class="mb-15"><img src="{{ asset('shop/assets/imgs/page/logo.webp') }}" alt="Plancher Laurentides" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('shop.search') }}" method="POST">
                            @csrf
                            <input name="search" id="search" placeholder="Faites une recherche..." />
                            <div id="advSearch"></div>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @auth
                            <div class="header-action-icon-2">
                                <a href="{{ route('shop.compare') }}">
                                    <img class="svgInject" alt="PL" src="{{ asset('shop/assets/imgs/theme/icons/icon-compare.svg') }}" />
                                    <span class="pro-count blue" id="compareQty">0</span>
                                </a>
                                <a href="{{ route('shop.compare') }}"><span class="lable"></span></a>
                            </div>

                            <div class="header-action-icon-2">
                                <a href="{{ route('shop.wishlist') }}">
                                    <img class="svgInject" alt="PL" src="{{ asset('shop/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue" id="wishQty">0</span>
                                </a>
                                <a href="{{ route('shop.wishlist') }}"><span class="lable"></span></a>
                            </div>
                            @else
                            @endauth

                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ route('shop.cart') }}">
                                    <img alt="Nest" src="{{ asset('shop/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue" id="cartQty">0</span>
                                </a>
                                <a href=""><span class="lable"></span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <!-- Start Mini cart ajax function -->
                                    <div id="miniCart"> </div>
                                    <!-- End Mini cart ajax function -->

                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-button">
                                            <a href="{{ route('shop.cart') }}" class="outline">Panier</a>
                                            <a href="{{ route('shop.checkout') }}">Commander</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Compte_PL" src="{{ asset('shop/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>
                                @auth
                                    <a href="{{ route('shop.account.dashboard') }}"><span class="lable ml-0">Mon Compte</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('shop.account.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('shop.account.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Déconnexion</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @else
                                        <a href="{{ route('login') }}"><span class="lable ml-0">Connexion</span></a>
                                        <span class="lable" style="margin-top: 8px; margin-left: 5px; margin-right: 5px;"> | </span>
                                        <a href="{{ route('register') }}"><span class="lable ml-0" style="color: #e90101; ">Inscription</span></a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@php  
    $brands = App\Models\Brands::orderBy('brand_name', 'ASC')->get();
@endphp

<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="index.html"><img src="{{ asset('shop/assets/imgs/page/logo.webp') }}" alt="logo Plancher Laurentides"/></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-categori-wrap d-none d-lg-block">
                    <a class="categories-button-active" href="#">
                        <span class="fi-rs-apps"></span> <span class="et">Nos</span>Marques
                        <i class="fi-rs-angle-down"></i>
                    </a>
                    <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                @foreach ( $brands as $item )
                                @if($loop->index < 5)
                                <li>
                                    <a href="{{ url('/produits/marques/'.$item->id.'/'.$item->brand_slug) }}"> <img src="{{ asset( $item->brand_image) }}" alt="" />{{ $item->brand_name }}</a>
                                </li>
                                @endif
                                @endforeach
                                
                            </ul>
                            <ul class="end">
                                @foreach ( $brands as $item )
                                @if($loop->index > 4)
                                <li>
                                    <a href="{{ url('/produits/marques/'.$item->id.'/'.$item->brand_slug) }}"> <img src="{{ asset( $item->brand_image) }}" alt="" />{{ $item->brand_name }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        
                        <ul>
                            <li><a href="{{ url('/') }}">Accueil</a></li>
                            
                            @php  
                            $categories = App\Models\Categories::orderBy('category_name','ASC')->limit(7)->get();
                            @endphp

                            @foreach ($categories as $category)
                            <li>
                                <a href="{{ url('produits/categories/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }} <!--<i class="fi-rs-angle-down"></i>--></a>
                                
                                <!-- @php  
                                $subcategories = App\Models\SubCategories::where('category_id', $category->id)->orderBy('subcategory_name','ASC')->get();
                                @endphp

                                <ul class="sub-menu">
                                    @foreach ($subcategories as $subcategory)
                                    <li><a href="#">{{ $subcategory->subcategory_name }}</a></li>
                                    @endforeach
                                </ul> -->
                            </li>
                            @endforeach
                            
                            <li>
                                <a href="{{ url('/a-propos') }}">À Propos <i class="fi-rs-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ url('/contactez-nous') }}">Coordonnées</a></li>
                                    <li><a href="{{ url('/faq') }}">F.A.Q</a></li>
                                <!-- <li><a href="{{ url('/contactez-nous') }}">Livraisons</a></li> -->
                                    <li><a href="{{ url('/politiques') }}">Politiques</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    @auth
                    <div class="header-action-icon-2">
                        <a href="{{ route('shop.compare') }}">
                            <img class="svgInject" alt="PL" src="{{ asset('shop/assets/imgs/theme/icons/icon-compare.svg') }}" />
                            <span class="pro-count blue" id="compareQty-2">0</span>
                        </a>
                        <a href="{{ route('shop.compare') }}"><span class="lable"></span></a>
                    </div>

                    <div class="header-action-icon-2">
                        <a href="{{ route('shop.wishlist') }}">
                            <img class="svgInject" alt="PL" src="{{ asset('shop/assets/imgs/theme/icons/icon-heart.svg') }}" />
                            <span class="pro-count blue" id="wishQty-2">0</span>
                        </a>
                        <a href="{{ route('shop.wishlist') }}"><span class="lable">Favoris</span></a>
                    </div>
                    @else
                    @endauth
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="{{ route('shop.cart') }}">
                            <img alt="Panier" src="{{ asset('shop/assets/imgs/theme/icons/icon-cart.svg') }}" />
                            <span class="pro-count white" id="mcartQty">0</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <!-- Start Mini cart ajax function -->
                            <div id="miniCartMobile"> </div>
                            <!-- End Mini cart ajax function -->

                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-button">
                                    <a href="{{ route('shop.cart') }}" class="outline">Panier</a>
                                    <a href="{{ route('shop.checkout') }}">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

<style>
    #advSearch{
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>

<script>
    function search_result_show(){
        $("#advSearch").slideDown();

    }

    function search_result_hide(){
        $("#advSearch").slideUp();
    }
</script>


<!-- start MOBILE header -->
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('shop/assets/imgs/page/logo.webp') }}"  alt="logo Plancher Laurentides" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="{{ route('shop.search') }}" method="POST">
                    @csrf
                    <input name="search2" placeholder="Faites une recherche..." />
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="{{ url('/') }}">Accueil</a>
                             
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ url('/boutique') }}">Boutique</a>
                        </li>
                        
                        <li class="menu-item-has-children">
                            <a href="{{ url('/a-propos') }}">À Propros</a>
                            <ul class="dropdown">
                                <li><a href="`{{ url('/contactez-nous') }}">Coordonnées</a></li>
                                <li><a href="{{ url('/faq') }}">F.A.Q</a></li>
                                <li><a href="{{ url('/politiques') }}">Politiques</a></li>
                            </ul>
                        </li>
                        @auth
                        <li class="menu-item-has-children">
                            <a href="{{ route('shop.account.dashboard') }}">Mon Compte</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('shop.account.dashboard') }}"><i class="fi fi-rs-user mr-10"></i>Profile</a></li>
                                <li><a href="{{ route('shop.account.logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Déconnexion</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="menu-item-has-children">
                            <a href="{{ route('login') }}"><i class="fi-rs-user"></i>Connexion</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('register') }}" style="color: #e90101;"><i class="fi-rs-user"></i>Insciption</a>
                        </li>
                        @endauth
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="tel:{{ $setting->phone }}"><i class="fi-rs-headphones"></i>{{ $setting->phone }}</a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Suivez-nous</h6>
                <a href="{{ $setting->face }}"><img src="{{ asset('shop/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
            </div>
            <div class="site-copyright">{{ $setting->copy }}</div>
        </div>
    </div>
</div>
<!--End MOBILE header-->

<!-- End Header  -->