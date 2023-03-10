<footer class="main">
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="{{ asset('shop/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Meilleur prix</h3>
                            <p>Contactez-nous</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="{{ asset('shop/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Livraison rapide</h3>
                            <p>Services impécable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="{{ asset('shop/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Promotions</h3>
                            <p>Rabais quotidiens</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="{{ asset('shop/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Variétés</h3>
                            <p>Qualité & durabilité</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="{{ asset('shop/assets/imgs/theme/icons/icon-5.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Personnalisé</h3>
                            <p>Disponible pour tous</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                @php
                $setting = App\Models\Settings::find(1);    
                @endphp
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="{{ url('/') }}" class="mb-15"><img src="{{ asset('shop/assets/imgs/page/logo.webp') }}" style="width:150px; height:120px" alt="Plancher Laurentides" /></a>
                            <p class="font-lg text-heading">Produits du Québec</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{ asset('shop/assets/imgs/theme/icons/icon-location.svg') }}" alt="" /><strong>Adresse: </strong><span>{{ $setting->address }}</span></li>
                            <li><img src="{{ asset('shop/assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Téléphone: </strong><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
                            <li><img src="{{ asset('shop/assets/imgs/theme/icons/icon-email-2.svg') }}" alt="" /><strong>Courriel: </strong><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
                            <li><img src="{{ asset('shop/assets/imgs/theme/icons/icon-clock.svg') }}" alt="" /><strong>Heures: </strong><span>07:00 - 18:00, Lun - Ven</span></li>
                        </ul>
                    </div>
                </div>
                    @php
                    $categories = App\Models\Categories::orderBy('id','ASC')->get();
                    $brands = App\Models\Brands::orderBy('id','ASC')->limit(4)->get();
                    @endphp
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title"><a href="{{ url('/boutique') }}">Boutique</a></h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach($categories as $category)
                        <li><a href="{{ url('produits/categories/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Populaire</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach($brands as $brand)
                        <li><a href="{{ url('produits/marques/'.$brand->id.'/'.$brand->brand_slug) }}">{{ $brand->brand_name }}</a></li>
                        @endforeach 
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title"><a href="{{ url('/a-propos') }}">À Propos</a></h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ url('/contactez-nous') }}">Coordonnées</a></li>
                        <li><a href="{{ url('/faq') }}">F.A.Q</a></li>
                        <li><a href="{{ url('/politiques') }}">Politiques</a></li>
                        <li><a href="mailto:{{ $setting->email }}">Support</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Mon compte</h4>
                    @auth
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{ route('shop.account.details') }}">Mon Profile</a></li>
                        <li><a href="{{ route('shop.account.orders') }}">Commandes</a></li>
                        <li><a href="{{ route('shop.account.password') }}">Mot de passe</a></li>
                        <li><a href="{{ route('shop.account.logout') }}">Déconnexion</a></li>
                    </ul>
                    @else
                    <a href="{{ route('login') }}"><span class="lable ml-0">Connexion</span></a>
                    <span class="lable" style="margin-top: 8px; margin-left: 5px; margin-right: 5px;"> | </span>
                    <a href="{{ route('register') }}"><span class="lable ml-0" style="color: #e90101; ">Inscription</span></a>
                    @endauth
                </div> 
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">{{ $setting->copyright }}</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">   
                <div class="hotline d-lg-inline-flex">
                    <img src="{{ asset('shop/assets/imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                    <a href="tel:{{ $setting->phone }}"><p>{{ $setting->phone }}</a><span>Contactez-nous<br>Lundi à Vendredi</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Suivez-nous</h6>
                    <a href="{{ $setting->facebook }}"><img src="{{ asset('shop/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="Facebook - Plancher Laurentides" /></a>
                    <a href="https://www.linkedin.com/company/plancher-laurentides"><img src="{{ asset('shop/assets/imgs/theme/icons/social-lki.svg') }}" alt="Linkedin - Plancher Laurentides" /></a>
            </div>
        </div>
    </div>
</footer>