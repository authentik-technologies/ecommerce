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
            <span></span> Politiques
        </div>
    </div>
</div>

<div class="page-content pt-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                            <div class="single-header style-2">
                                <h2>Politiques & Conditions d'utilisations</h2>
                            </div>
                            <h4>POLITIQUE DE REMBOURSEMENT</h4>
                            <br>
                            <ol start="1">
                                <li>Chez Plancher Laurentides Boutique en ligne, Si vous n?????tes pas satisfait de votre achat, nous serons heureux de vous <strong>??changer les produits sans frais</strong>.<br><br> Si votre achat ne convient pas suite ?? la commande, nous reprendrons la marchandise sans frais sur pr??sentation de la facture originale. 
                                    Merci de retourner les produits en bonne condition et dans l???emballage d???origine. Aucun remboursement sur les plancher de bois.<br><br>
                                    Plancher Laurentides se r??serve le droit de ne pas accepter un retour de produit dont l???emballage ou l?????tat g??n??ral du produit est d??ficient. Nous pouvons <strong>rembourser la plupart des articles en surplus dans les 30 jours</strong> suivant la date d???achat indiqu??e sur votre facture.<br><br>
                                   <strong>Les conditions de la politique de retour peuvent ??tre modifi??es sans pr??avis.</strong></li><br><br>
                            </ol>
                            <h4>POLITIQUE DE CONFIDENTIALIT??</h4>
                            <br>
                            <ol start="2">
                                <li>https://www.plancherlaurentides.com<br>
                                    Plancher Laurentides INC.<br>
                                    Type de site: Commerce en ligne (e-commerce).<br><br>
                                    <h6><strong>Le but de cette politique de confidentialit??</strong>.</h6><br>
                                    Le but de cette politique de confidentialit?? est d???informer les utilisateurs de notre site des donn??es personnelles que nous recueillerons ainsi que les informations suivantes, le cas ??ch??ant :<br><br>
                                    1. Les donn??es personnelles que nous recueillerons<br>
                                    2. L???utilisation des donn??es recueillies<br>
                                    3. Qui a acc??s aux donn??es recueillies<br>
                                    4. Les droits des utilisateurs du site<br>
                                    5. La politique de cookies du site <br><br>
                                    Cette politique de confidentialit?? fonctionne parall??lement aux conditions g??n??rales d???utilisation de notre site.<br><br>
                                </li>
                            </ol>
                            <h4>LOIS APPLICABLES</h4>
                            <br>
                            <ol start="3">
                                <li>Cette politique est conforme aux lois ??nonc??es dans la loi sur la protection des renseignements personnels et les documents ??lectroniques (LPRPDE).<br><br> 
                                    Pour les r??sidents des pays de l???UE, le R??glement g??n??ral sur la protection des donn??es (RGDP) r??git toutes les politiques de protection des donn??es, quel que soit l???endroit o?? se trouve le site. La pr??sente politique de confidentialit?? vise ?? se conformer au RGDP. 
                                    S???il y a des incoh??rences entre la pr??sente politique et le RGDP, le RGDP s???appliquera. <br><br>
                                    Pour les r??sidents de l?????tat de Californie, cette politique de confidentialit?? vise ?? se conformer ?? la California Consumer Privacy Act (CCPA). 
                                    S???il y a des incoh??rences entre ce document et la CCPA, la l??gislation de l?????tat s???appliquera. Si nous constatons des incoh??rences, nous modifierons notre politique pour nous conformer ?? la loi pertinente.
                                   </li><br><br>
                            </ol>
                            <h4>CONSENTEMENT</h4>
                            <br>
                            <ol start="4">
                                <li>Les utilisateurs conviennent qu???en utilisant notre site, ils consentent ?? :<br><br> 
                                    1. les conditions ??nonc??es dans la pr??sente politique de confidentialit?? et<br>
                                    2. la collecte, l???utilisation et la conservation des donn??es ??num??r??es dans la pr??sente politique.<br><br>
                                    <strong>Donn??es personnelles que nous collectons</strong><br>
                                    Donn??es collect??es automatiquement.<br><br>
                                    <strong>Donn??es recueillies de fa??on non automatique</strong><br>
                                    Nous pouvons ??galement collecter les donn??es suivantes lorsque vous effectuez certaines fonctions sur notre site :<br><br>
                                    1. Pr??nom et nom<br>
                                    2. ??ge<br>
                                    3. Date de naissance<br>
                                    4. Sexe<br>
                                    5. Email<br>
                                    6. Num??ro de t??l??phone<br>
                                    7. Domicile
                                   </li><br><br>
                            </ol>
                            <h3>Ces donn??es peuvent ??tre recueillies au moyen des m??thodes suivantes :</h3>
                            <br>
                            <h4>ENREGISTREMENT D'UN COMPTE</h4>
                            <ol start="5">
                                <li>Veuillez noter que nous ne collectons que les donn??es qui nous aident ?? atteindre l???objectif ??nonc?? dans cette politique de confidentialit??. Nous ne recueillerons pas de donn??es suppl??mentaires sans vous en informer au pr??alable.<br><br> 
                                    <strong>Comment nous utilisons les donn??es personnelles</strong><br>
                                    Les donn??es personnelles recueillies sur notre site seront utilis??es uniquement aux fins pr??cis??es dans la pr??sente politique ou indiqu??es sur les pages pertinentes de notre site. Nous n???utiliserons pas vos donn??es au-del?? de ce que nous divulguerons.<br><br>
                                    <strong>Les donn??es que nous recueillons lorsque l???utilisateur ex??cute certaines fonctions peuvent ??tre utilis??es aux fins suivantes :</strong><br>
                                    1. Suivi de commande et communication<br><br>
                                    <strong>Avec qui nous partageons les donn??es personnelles</strong><br><br>
                                    <strong>Employ??s</strong><br>
                                    Nous pouvons divulguer ?? tout membre de notre organisation les donn??es utilisateur dont il a raisonnablement besoin pour r??aliser les objectifs ??nonc??s dans la pr??sente politique.
                                    Les tiers ne seront pas en mesure d???acc??der aux donn??es des utilisateurs au-del?? de ce qui est raisonnablement n??cessaire pour atteindre l???objectif donn??.<br><br>
                                    <strong>Autres divulgations</strong><br>
                                    Nous nous engageons ?? ne pas vendre ou partager vos donn??es avec des tiers, sauf dans les cas suivants :<br><br>
                                    1. si la loi l???exige<br>
                                    2. si elle est requise pour toute proc??dure judiciaire<br>
                                    3. pour prouver ou prot??ger nos droits l??gaux<br>
                                    4. ?? des acheteurs ou des acheteurs potentiels de cette soci??t?? dans le cas o?? nous cherchons ?? la vendre la soci??t??<br><br>
                                    Si vous suivez des hyperliens de notre site vers un autre site, veuillez noter que nous ne sommes pas responsables et n???avons pas de contr??le sur leurs politiques et pratiques de confidentialit??.<br><br>
                                    <strong>Combien de temps nous stockons les donn??es personnelles</strong><br>
                                    Nous ne conservons pas les donn??es des utilisateurs au-del?? de ce qui est n??cessaire pour atteindre les fins pour lesquelles elles sont recueillies.<br><br>
                                    <strong>Comment nous prot??geons vos donn??es personnelles</strong><br>
                                    Afin d???assurer la protection de votre s??curit??, nous utilisons le protocole de s??curit?? de la couche transport pour transmettre des renseignements personnels dans notre syst??me.<br><br>
                                    Toutes les donn??es stock??es dans notre syst??me sont bien s??curis??es et ne sont accessibles qu????? nos employ??s. Nos employ??s sont li??s par des accords de confidentialit?? stricts et une violation de cet accord entra??nait le licenciement de l???employ??.<br><br>
                                    Alors que nous prenons toutes les pr??cautions raisonnables pour nous assurer que nos donn??es d???utilisateur sont s??curis??es et que les utilisateurs sont prot??g??s, il reste toujours du risque de pr??judice. L???Internet en sa totalit?? peut ??tre, parfois, peu s??r et donc nous sommes incapables de garantir la s??curit?? des donn??es des utilisateurs au-del?? de ce qui est raisonnablement pratique.<br><br>
                                    <strong>Mineurs</strong><br>
                                    Pour les r??sidents de l???UE, le RGPD pr??cise que les personnes de moins de 15 ans sont consid??r??es comme des mineurs aux fins de la collecte de donn??es. Les mineurs doivent avoir le consentement d???un repr??sentant l??gal pour que leurs donn??es soient recueillies, trait??es et utilis??es.
                                    <br><br>  
                                    <strong>Vos droits en tant qu???utilisateur</strong>
                                    <br><br>  
                                    En tant qu???utilisateur, vous avez le droit d???acc??der ?? toutes vos donn??es personnelles que nous avons collect??es. En outre, vous avez le droit de mettre ?? jour ou de corriger toute donn??e personnelle en notre possession ?? condition qu???elle soit acceptable en vertu de la loi.
                                    <br><br>
                                    Vous pouvez choisir de supprimer ou de modifier votre consentement ?? la collecte et ?? l???utilisation des donn??es en tout temps, pourvu qu???il soit l??galement acceptable de le faire et que vous nous en ayez inform?? dans un d??lai raisonnable.
                                    <br><br>
                                    <strong>Comment modifier, supprimer ou contester les donn??es recueillies</strong>
                                    <br><br>
                                    Si vous souhaitez que vos renseignements soient supprim??s ou modifi??s d???une fa??on ou d???une autre, veuillez communiquer avec notre agent de protection de la vie priv??e ici :
                                    <br><br>
                                    <strong>Modifications</strong><br>
                                    Cette politique de confidentialit?? peut ??tre modifi??e ?? l???occasion afin de maintenir la conformit?? avec la loi et de tenir compte de tout changement ?? notre processus de collecte de donn??es. 
                                    Nous recommandons ?? nos utilisateurs de v??rifier notre politique de temps ?? autre pour s???assurer qu???ils soient inform??s de toute mise ?? jour. Au besoin, nous pouvons informer les utilisateurs par courriel des changements apport??s ?? cette politique.<br><br>
                                    <strong>Contact</strong><br>
                                    Si vous avez des questions ?? nous poser, n???h??sitez pas ?? communiquer avec nous en utilisant ce qui suit:<br><br>
                                    D.fradet@plancherlaurentides.com<br>
                                    2200 boulvard Ste-Sophie, Ste-Sophie, QC J5J2P5<br><br>
                                    Date d???entr??e en vigueur : le 30 janvier 2021<br>
                                    ??2002-2021 LawDepot.ca??
                                   </li><br><br>
                            </ol>
                            <h4>CONDITIONS G??N??RALES</h4>
                            <ol start="6">
                                <li>Les pr??sentes conditions g??n??rales r??gissent l???utilisation de ce site www.plancherlaurentides.com.<br> 
                                    Ce site appartient et est g??r?? par Plancher Laurentides INC<br> 
                                    En utilisant ce site, vous indiquez que vous avez lu et compris les conditions d???utilisation et que vous acceptez de les respecter en tout temps.<br>
                                    Type de site : e-commerce<br><br>

                                    <strong>Propri??t?? intellectuelle</strong><br>
                                    Tout contenu publi?? et mis ?? disposition sur ce site est la propri??t?? de Plancher Laurentides INC et de ses cr??ateurs. 
                                    Cela comprend, mais n???est pas limit?? aux images, textes, logos, documents, fichiers t??l??chargeables et tout ce qui contribue ?? la composition de ce site.<br><br>
                                                                       1. Suivi de commande et communication<br><br>
                                    <strong>Comptes</strong><br>
                                    Lorsque vous cr??ez un compte sur notre site, vous acceptez ce qui suit :<br>
                                    1. que vous ??tes seul responsable de votre compte et de la s??curit?? et la confidentialit?? de votre compte, y compris les mots de passe ou les renseignements de nature d??licate joints ?? ce compte, et<br>
                                    2. que tous les renseignements personnels que vous nous fournissez par l???entremise de votre compte sont ?? jour, exacts et v??ridiques et que vous mettrez ?? jour vos renseignements personnels s???ils changent.<br><br>

                                    Nous nous r??servons le droit de suspendre ou de r??silier votre compte si vous utilisez notre site ill??galement ou si vous violez les conditions d???utilisation acceptable.<br><br>
                                    
                                    <strong>Ventes des biens et services</strong><br>
                                    Ce document r??git la vente des biens et services mis ?? disposition sur notre site.<br><br>
                                    
                                    <strong>Les biens que nous offrons comprennent :</strong><br>
                                    - Rev??tement de sol et accessoires<br><br>
                                    
                                    <strong>Les services que nous offrons comprennent :</strong><br>
                                    - Expertise<br><br>
                                    Les biens et services li??s ?? ce document sont les biens et services qui sont affich??s sur notre site au moment o?? vous y acc??dez. 
                                    Cela comprend tous les produits ??num??r??s comme ??tant en rupture de stock. Toutes les informations, descriptions ou images que nous fournissons sur nos biens et services sont d??crites et pr??sent??es avec la plus grande pr??cision possible. 
                                    Cependant, nous ne sommes pas l??galement  tenus par ces informations, descriptions ou images car nous ne pouvons pas garantir l???exactitude de chaque produit ou service que nous fournissons. 
                                    Vous acceptez d???acheter ces biens et services ?? vos propres risques.<br><br>
                                    
                                    <strong>Vendus par des tiers</strong><br>
                                    Notre site peut offrir des biens et services de soci??t??s tierces. Nous ne pouvons pas garantir la qualit?? ou l???exactitude des biens et services mis ?? disposition par des tiers sur notre site.<br><br>
                                    
                                    <strong>Paiements</strong><br>
                                    Nous acceptons les modes de paiement suivants sur ce site :<br>
                                    - Carte bancaire<br>
                                    - Pr??l??vement automatique<br><br>
                                    Lorsque vous nous fournissez vos renseignements de paiement, vous nous confirmez que vous avez autoris?? l???utilisation et l???acc??s ?? l???instrument de paiement que vous avez choisi d???utiliser. 
                                    En nous fournissant vos d??tails de paiement, vous confirmez que vous nous autorisez ?? facturer le montant d?? ?? cet instrument de paiement.<br><br>
                                    Si nous estimons que votre paiement a viol?? une loi ou l???une de nos conditions d???utilisation, nous nous r??servons le droit d???annuler votre transaction.<br><br>
                                    
                                    <strong>Services</strong><br>
                                    Les services seront factur??s en totalit?? ?? la commande du service.<br><br>

                                    <strong>Abonnements</strong><br>
                                    Tous nos abonnements r??currents seront automatiquement factur??s et renouvel??s jusqu????? ce que nous recevions d???avis que vous souhaitez annuler l???abonnement.<br><br>
                                    Si vous souhaitez annuler vos abonnements, veuillez suivre ces ??tapes :<br>
                                    Vous pouvez annul?? votre abonnement en tout temps. Cependant, tout abonnement entam?? ne sera pas rembours?? pour la mensualit?? d??but??.<br><br>
                                    
                                    <strong>Transport et livraison</strong><br>
                                    Lorsque vous effectuez un achat sur notre site, vous acceptez et reconnaissez de fournir un email valide et une adresse d???exp??dition pour la commande. Nous nous r??servons le droit de modifier, rejeter ou annuler votre commande chaque fois que cela devient n??cessaire. 
                                    Si nous annulons votre commande et avons d??j?? trait?? votre paiement, nous vous donnerons un remboursement ??quivalent au montant que vous avez pay??. 
                                    Vous convenez qu???il vous incombe de surveiller votre mode de paiement. Bien que nous visions ?? vous fournir une estimation pr??cise des d??lais et des co??ts d???exp??dition, ceux-ci peuvent varier en raison de circonstances impr??vues.<br><br>
                                
                                    <strong>Remboursement</strong><br><br>
                                    Nous acceptons les demandes de remboursement sur notre site pour les produits qui r??pondent ?? l???une des exigences suivantes :<br> 
                                    1. le bien est cass??<br>
                                    2. le bien n???est pas tel que d??crit<br><br>
                                    Les demandes de remboursement peuvent ??tre faites dans les d??lais de 30 jours apr??s la r??ception de vos biens et services.<br><br>
                                    Les remboursements ne s???appliquent pas aux produits/services suivants :<br>
                                    1. Aucun remboursement sur les plancher de bois, et sur tout mat??riel donc les boite serais ouverte.<br><br>

                                    <strong>Remboursements ou annulations des services</strong><br>
                                    - Les services seront rembours??s en cas d???annulation au moins 48 heures avant la r??servation du service.<br><br>

                                    <strong>Retours</strong><br>
                                    Les retours peuvent ??tre effectu??s en personne aux endroits suivants : Notre magasin de vente<br><br>
                                    Veuillez suivre cette proc??dure pour retourner vos articles par la poste :<br>
                                    Appeler directement au centre de services.<br>
                                    450-504-6011<br><br>

                                    <strong>Garanties</strong><br>
                                    1. Tout les garantie du manufacturier sont applicable sur les produits vendu par Plancher Laurentides Inc.<br><br>
                                    Limitation de responsabilit??<br>
                                    Plancher Laurentides INC ou l???un de ses employ??s sera tenu responsable de tout probl??me d??coulant de ce site. 
                                    N??anmoins, Plancher Laurentides INC et ses employ??s ne seront pas tenus responsables de tout probl??me d??coulant de toute utilisation irr??guli??re de ce site.<br><br>


                                    <strong>Indemnit??</strong><br>
                                    En tant qu???utilisateur, vous indemnisez par les pr??sentes Plancher Laurentides INC de toute responsabilit??, de tout co??t, de toute cause d???action, de tout dommage ou de toute d??pense d??coulant de votre utilisation de ce site ou de votre violation de l???une des dispositions ??nonc??es dans le pr??sent document.<br><br>

                                    <strong>Lois applicables</strong><br>
                                    Ce document est soumis aux lois applicables du Canada et vise ?? se conformer ?? ses r??gles et r??glements n??cessaires.<br><br>
                                    Pour les r??sidents de l???UE, le RGPD est la loi applicable qui r??git ce document. En cas d???incompatibilit?? entre une disposition du pr??sent document et le RGPD, les r??gles du RGPD auront pr??s??ance.<br><br>

                                    <strong>Divisibilit??</strong><br>
                                    Si, ?? tout moment, l???une des dispositions ??nonc??es dans le pr??sent document est jug??e incompatible ou invalide en vertu des lois applicables, ces dispositions seront consid??r??es comme nulles et seront retir??es du pr??sent document. Toutes les autres dispositions ne seront pas touch??es par les lois et le reste du document sera toujours consid??r?? comme valide.<br><br>

                                    <strong>Modifications</strong><br>
                                    Ces conditions g??n??rales peuvent ??tre modifi??es de temps ?? autre afin de maintenir le respect de la loi et de refl??ter tout changement ?? la fa??on dont nous g??rons notre site et la fa??on dont nous nous attendons ?? ce que les utilisateurs se comportent sur notre site. 
                                    Nous recommandons ?? nos utilisateurs de v??rifier ces conditions g??n??rales de temps ?? autre pour s???assurer qu???ils sont inform??s de toute mise ?? jour. Au besoin, nous informerons les utilisateurs par courriel des changements apport??s ?? ces conditions ou nous afficherons un avis sur notre site.<br><br>

                                    <strong>Contact</strong><br>
                                    Veuillez communiquer avec nous si vous avez des questions ou des pr??occupations. Nos coordonn??es sont les suivantes ::<br><br>
                                    D.fradet@plancherlaurentides.com<br>
                                    2200 boulvard Ste-Sophie, Ste-Sophie, QC J5J2P5<br><br>
                                    Date d???entr??e en vigueur : le 30 janvier 2021<br>
                                    ??2002-2021 LawDepot.ca??
                                   </li><br><br>
                            </ol>
                            <h4>MODE D'EXP??DITION</h4>
                            <br>
                            <ol start="7">
                                <li>La m??thode de livraison a ??t?? s??lectionn??e pour donner une livraison rapide et s??re. Nous utilisons g??n??ralement des transporteurs qui vous livrent ?? domicile.</li><br><br>
                            </ol>
                            <h4>FRAIS DE LIVRAISON</h4>
                            <br>
                            <ol start="8">
                                <li>Les frais de livraison couvrent les frais de pr??paration et d???emballage, plus l???affranchissement. En aucun cas un client ne pourra combiner plusieurs commandes pour b??n??ficier d???une r??duction des frais de port. 
                                    Des frais minimum de 90$ seront exig?? pour les commandes de moins de 2000 $. Des frais de transport peuvent s???appliquer dans les r??gion ??loign??. Des frais de transport pour les produits m??nag?? sont diff??rent et ??tablis selon les prix de transport avec poste canada. </li><br><br>
                            </ol>
                            <h4>D??LAIS DE LIVRAISON</h4>
                            <br>
                            <ol start="9">
                                <li>Un d??lai de deux jours ouvrables doit ??tre allou?? au traitement des commandes pour les produits en stock ?? notre boutique, auquel il faut ajouter un ?? trois jours ouvrables en moyenne pour une livraison au Qu??bec et un ?? cinq jours ouvrables pour l???Ontario. 
                                    Plancher Laurentides boutique en ligne ne pourra en aucun cas ??tre tenue responsable d???un retard de livraison r??sultant d???une rupture de stock chez le distributeur ou attribuable au transporteur. 
                                    Veillez communiquer avec nous par ??mail ou t??l??phone pour une commande avec livraison acc??l??r??e. Plancher Laurentides boutique en ligne ne pourra en aucun cas ??tre tenue responsable d???un retard de livraison pour le temps des f??tes ?? partir du 17 d??cembre de chaque ann??e.</li><br><br>
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Cat??gories</h5>
                                <ul>
                                    @foreach($categories as $category)
                                    @php
                                        $products = App\Models\Products::where('category_id',$category->id)->get();
                                    @endphp
                                    <li>
                                        <a href="{{ url('produits/categories/'.$category->id.'/'.$category->category_slug) }}"> <img src="{{ asset($category->category_image) }}" alt="" />{{ $category->category_name }}</a><span class="count">{{ count($products) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Marques</h5>
                                <ul>
                                    @foreach($brands as $brand)
                                    @php
                                        $products = App\Models\Products::where('brand_id',$brand->id)->get();
                                    @endphp
                                    <li>
                                        <a href="{{ url('produits/marques/'.$brand->id.'/'.$brand->brand_slug) }}"> <img src="{{ asset($brand->brand_image) }}" alt="" />{{ $brand->brand_name }}</a><span class="count">{{ count($products) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection