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
                                <li>Chez Plancher Laurentides Boutique en ligne, Si vous n’êtes pas satisfait de votre achat, nous serons heureux de vous <strong>échanger les produits sans frais</strong>.<br><br> Si votre achat ne convient pas suite à la commande, nous reprendrons la marchandise sans frais sur présentation de la facture originale. 
                                    Merci de retourner les produits en bonne condition et dans l’emballage d’origine. Aucun remboursement sur les plancher de bois.<br><br>
                                    Plancher Laurentides se réserve le droit de ne pas accepter un retour de produit dont l’emballage ou l’état général du produit est déficient. Nous pouvons <strong>rembourser la plupart des articles en surplus dans les 30 jours</strong> suivant la date d’achat indiquée sur votre facture.<br><br>
                                   <strong>Les conditions de la politique de retour peuvent être modifiées sans préavis.</strong></li><br><br>
                            </ol>
                            <h4>POLITIQUE DE CONFIDENTIALITÉ</h4>
                            <br>
                            <ol start="2">
                                <li>https://www.plancherlaurentides.com<br>
                                    Plancher Laurentides INC.<br>
                                    Type de site: Commerce en ligne (e-commerce).<br><br>
                                    <h6><strong>Le but de cette politique de confidentialité</strong>.</h6><br>
                                    Le but de cette politique de confidentialité est d’informer les utilisateurs de notre site des données personnelles que nous recueillerons ainsi que les informations suivantes, le cas échéant :<br><br>
                                    1. Les données personnelles que nous recueillerons<br>
                                    2. L’utilisation des données recueillies<br>
                                    3. Qui a accès aux données recueillies<br>
                                    4. Les droits des utilisateurs du site<br>
                                    5. La politique de cookies du site <br><br>
                                    Cette politique de confidentialité fonctionne parallèlement aux conditions générales d’utilisation de notre site.<br><br>
                                </li>
                            </ol>
                            <h4>LOIS APPLICABLES</h4>
                            <br>
                            <ol start="3">
                                <li>Cette politique est conforme aux lois énoncées dans la loi sur la protection des renseignements personnels et les documents électroniques (LPRPDE).<br><br> 
                                    Pour les résidents des pays de l’UE, le Règlement général sur la protection des données (RGDP) régit toutes les politiques de protection des données, quel que soit l’endroit où se trouve le site. La présente politique de confidentialité vise à se conformer au RGDP. 
                                    S’il y a des incohérences entre la présente politique et le RGDP, le RGDP s’appliquera. <br><br>
                                    Pour les résidents de l’État de Californie, cette politique de confidentialité vise à se conformer à la California Consumer Privacy Act (CCPA). 
                                    S’il y a des incohérences entre ce document et la CCPA, la législation de l’État s’appliquera. Si nous constatons des incohérences, nous modifierons notre politique pour nous conformer à la loi pertinente.
                                   </li><br><br>
                            </ol>
                            <h4>CONSENTEMENT</h4>
                            <br>
                            <ol start="4">
                                <li>Les utilisateurs conviennent qu’en utilisant notre site, ils consentent à :<br><br> 
                                    1. les conditions énoncées dans la présente politique de confidentialité et<br>
                                    2. la collecte, l’utilisation et la conservation des données énumérées dans la présente politique.<br><br>
                                    <strong>Données personnelles que nous collectons</strong><br>
                                    Données collectées automatiquement.<br><br>
                                    <strong>Données recueillies de façon non automatique</strong><br>
                                    Nous pouvons également collecter les données suivantes lorsque vous effectuez certaines fonctions sur notre site :<br><br>
                                    1. Prénom et nom<br>
                                    2. Âge<br>
                                    3. Date de naissance<br>
                                    4. Sexe<br>
                                    5. Email<br>
                                    6. Numéro de téléphone<br>
                                    7. Domicile
                                   </li><br><br>
                            </ol>
                            <h3>Ces données peuvent être recueillies au moyen des méthodes suivantes :</h3>
                            <br>
                            <h4>ENREGISTREMENT D'UN COMPTE</h4>
                            <ol start="5">
                                <li>Veuillez noter que nous ne collectons que les données qui nous aident à atteindre l’objectif énoncé dans cette politique de confidentialité. Nous ne recueillerons pas de données supplémentaires sans vous en informer au préalable.<br><br> 
                                    <strong>Comment nous utilisons les données personnelles</strong><br>
                                    Les données personnelles recueillies sur notre site seront utilisées uniquement aux fins précisées dans la présente politique ou indiquées sur les pages pertinentes de notre site. Nous n’utiliserons pas vos données au-delà de ce que nous divulguerons.<br><br>
                                    <strong>Les données que nous recueillons lorsque l’utilisateur exécute certaines fonctions peuvent être utilisées aux fins suivantes :</strong><br>
                                    1. Suivi de commande et communication<br><br>
                                    <strong>Avec qui nous partageons les données personnelles</strong><br><br>
                                    <strong>Employés</strong><br>
                                    Nous pouvons divulguer à tout membre de notre organisation les données utilisateur dont il a raisonnablement besoin pour réaliser les objectifs énoncés dans la présente politique.
                                    Les tiers ne seront pas en mesure d’accéder aux données des utilisateurs au-delà de ce qui est raisonnablement nécessaire pour atteindre l’objectif donné.<br><br>
                                    <strong>Autres divulgations</strong><br>
                                    Nous nous engageons à ne pas vendre ou partager vos données avec des tiers, sauf dans les cas suivants :<br><br>
                                    1. si la loi l’exige<br>
                                    2. si elle est requise pour toute procédure judiciaire<br>
                                    3. pour prouver ou protéger nos droits légaux<br>
                                    4. à des acheteurs ou des acheteurs potentiels de cette société dans le cas où nous cherchons à la vendre la société<br><br>
                                    Si vous suivez des hyperliens de notre site vers un autre site, veuillez noter que nous ne sommes pas responsables et n’avons pas de contrôle sur leurs politiques et pratiques de confidentialité.<br><br>
                                    <strong>Combien de temps nous stockons les données personnelles</strong><br>
                                    Nous ne conservons pas les données des utilisateurs au-delà de ce qui est nécessaire pour atteindre les fins pour lesquelles elles sont recueillies.<br><br>
                                    <strong>Comment nous protégeons vos données personnelles</strong><br>
                                    Afin d’assurer la protection de votre sécurité, nous utilisons le protocole de sécurité de la couche transport pour transmettre des renseignements personnels dans notre système.<br><br>
                                    Toutes les données stockées dans notre système sont bien sécurisées et ne sont accessibles qu’à nos employés. Nos employés sont liés par des accords de confidentialité stricts et une violation de cet accord entraînait le licenciement de l’employé.<br><br>
                                    Alors que nous prenons toutes les précautions raisonnables pour nous assurer que nos données d’utilisateur sont sécurisées et que les utilisateurs sont protégés, il reste toujours du risque de préjudice. L’Internet en sa totalité peut être, parfois, peu sûr et donc nous sommes incapables de garantir la sécurité des données des utilisateurs au-delà de ce qui est raisonnablement pratique.<br><br>
                                    <strong>Mineurs</strong><br>
                                    Pour les résidents de l’UE, le RGPD précise que les personnes de moins de 15 ans sont considérées comme des mineurs aux fins de la collecte de données. Les mineurs doivent avoir le consentement d’un représentant légal pour que leurs données soient recueillies, traitées et utilisées.
                                    <br><br>  
                                    <strong>Vos droits en tant qu’utilisateur</strong>
                                    <br><br>  
                                    En tant qu’utilisateur, vous avez le droit d’accéder à toutes vos données personnelles que nous avons collectées. En outre, vous avez le droit de mettre à jour ou de corriger toute donnée personnelle en notre possession à condition qu’elle soit acceptable en vertu de la loi.
                                    <br><br>
                                    Vous pouvez choisir de supprimer ou de modifier votre consentement à la collecte et à l’utilisation des données en tout temps, pourvu qu’il soit légalement acceptable de le faire et que vous nous en ayez informé dans un délai raisonnable.
                                    <br><br>
                                    <strong>Comment modifier, supprimer ou contester les données recueillies</strong>
                                    <br><br>
                                    Si vous souhaitez que vos renseignements soient supprimés ou modifiés d’une façon ou d’une autre, veuillez communiquer avec notre agent de protection de la vie privée ici :
                                    <br><br>
                                    <strong>Modifications</strong><br>
                                    Cette politique de confidentialité peut être modifiée à l’occasion afin de maintenir la conformité avec la loi et de tenir compte de tout changement à notre processus de collecte de données. 
                                    Nous recommandons à nos utilisateurs de vérifier notre politique de temps à autre pour s’assurer qu’ils soient informés de toute mise à jour. Au besoin, nous pouvons informer les utilisateurs par courriel des changements apportés à cette politique.<br><br>
                                    <strong>Contact</strong><br>
                                    Si vous avez des questions à nous poser, n’hésitez pas à communiquer avec nous en utilisant ce qui suit:<br><br>
                                    D.fradet@plancherlaurentides.com<br>
                                    2200 boulvard Ste-Sophie, Ste-Sophie, QC J5J2P5<br><br>
                                    Date d’entrée en vigueur : le 30 janvier 2021<br>
                                    ©2002-2021 LawDepot.ca®
                                   </li><br><br>
                            </ol>
                            <h4>CONDITIONS GÉNÉRALES</h4>
                            <ol start="6">
                                <li>Les présentes conditions générales régissent l’utilisation de ce site www.plancherlaurentides.com.<br> 
                                    Ce site appartient et est géré par Plancher Laurentides INC<br> 
                                    En utilisant ce site, vous indiquez que vous avez lu et compris les conditions d’utilisation et que vous acceptez de les respecter en tout temps.<br>
                                    Type de site : e-commerce<br><br>

                                    <strong>Propriété intellectuelle</strong><br>
                                    Tout contenu publié et mis à disposition sur ce site est la propriété de Plancher Laurentides INC et de ses créateurs. 
                                    Cela comprend, mais n’est pas limité aux images, textes, logos, documents, fichiers téléchargeables et tout ce qui contribue à la composition de ce site.<br><br>
                                                                       1. Suivi de commande et communication<br><br>
                                    <strong>Comptes</strong><br>
                                    Lorsque vous créez un compte sur notre site, vous acceptez ce qui suit :<br>
                                    1. que vous êtes seul responsable de votre compte et de la sécurité et la confidentialité de votre compte, y compris les mots de passe ou les renseignements de nature délicate joints à ce compte, et<br>
                                    2. que tous les renseignements personnels que vous nous fournissez par l’entremise de votre compte sont à jour, exacts et véridiques et que vous mettrez à jour vos renseignements personnels s’ils changent.<br><br>

                                    Nous nous réservons le droit de suspendre ou de résilier votre compte si vous utilisez notre site illégalement ou si vous violez les conditions d’utilisation acceptable.<br><br>
                                    
                                    <strong>Ventes des biens et services</strong><br>
                                    Ce document régit la vente des biens et services mis à disposition sur notre site.<br><br>
                                    
                                    <strong>Les biens que nous offrons comprennent :</strong><br>
                                    - Revêtement de sol et accessoires<br><br>
                                    
                                    <strong>Les services que nous offrons comprennent :</strong><br>
                                    - Expertise<br><br>
                                    Les biens et services liés à ce document sont les biens et services qui sont affichés sur notre site au moment où vous y accédez. 
                                    Cela comprend tous les produits énumérés comme étant en rupture de stock. Toutes les informations, descriptions ou images que nous fournissons sur nos biens et services sont décrites et présentées avec la plus grande précision possible. 
                                    Cependant, nous ne sommes pas légalement  tenus par ces informations, descriptions ou images car nous ne pouvons pas garantir l’exactitude de chaque produit ou service que nous fournissons. 
                                    Vous acceptez d’acheter ces biens et services à vos propres risques.<br><br>
                                    
                                    <strong>Vendus par des tiers</strong><br>
                                    Notre site peut offrir des biens et services de sociétés tierces. Nous ne pouvons pas garantir la qualité ou l’exactitude des biens et services mis à disposition par des tiers sur notre site.<br><br>
                                    
                                    <strong>Paiements</strong><br>
                                    Nous acceptons les modes de paiement suivants sur ce site :<br>
                                    - Carte bancaire<br>
                                    - Prélèvement automatique<br><br>
                                    Lorsque vous nous fournissez vos renseignements de paiement, vous nous confirmez que vous avez autorisé l’utilisation et l’accès à l’instrument de paiement que vous avez choisi d’utiliser. 
                                    En nous fournissant vos détails de paiement, vous confirmez que vous nous autorisez à facturer le montant dû à cet instrument de paiement.<br><br>
                                    Si nous estimons que votre paiement a violé une loi ou l’une de nos conditions d’utilisation, nous nous réservons le droit d’annuler votre transaction.<br><br>
                                    
                                    <strong>Services</strong><br>
                                    Les services seront facturés en totalité à la commande du service.<br><br>

                                    <strong>Abonnements</strong><br>
                                    Tous nos abonnements récurrents seront automatiquement facturés et renouvelés jusqu’à ce que nous recevions d’avis que vous souhaitez annuler l’abonnement.<br><br>
                                    Si vous souhaitez annuler vos abonnements, veuillez suivre ces étapes :<br>
                                    Vous pouvez annulé votre abonnement en tout temps. Cependant, tout abonnement entamé ne sera pas remboursé pour la mensualité débuté.<br><br>
                                    
                                    <strong>Transport et livraison</strong><br>
                                    Lorsque vous effectuez un achat sur notre site, vous acceptez et reconnaissez de fournir un email valide et une adresse d’expédition pour la commande. Nous nous réservons le droit de modifier, rejeter ou annuler votre commande chaque fois que cela devient nécessaire. 
                                    Si nous annulons votre commande et avons déjà traité votre paiement, nous vous donnerons un remboursement équivalent au montant que vous avez payé. 
                                    Vous convenez qu’il vous incombe de surveiller votre mode de paiement. Bien que nous visions à vous fournir une estimation précise des délais et des coûts d’expédition, ceux-ci peuvent varier en raison de circonstances imprévues.<br><br>
                                
                                    <strong>Remboursement</strong><br><br>
                                    Nous acceptons les demandes de remboursement sur notre site pour les produits qui répondent à l’une des exigences suivantes :<br> 
                                    1. le bien est cassé<br>
                                    2. le bien n’est pas tel que décrit<br><br>
                                    Les demandes de remboursement peuvent être faites dans les délais de 30 jours après la réception de vos biens et services.<br><br>
                                    Les remboursements ne s’appliquent pas aux produits/services suivants :<br>
                                    1. Aucun remboursement sur les plancher de bois, et sur tout matériel donc les boite serais ouverte.<br><br>

                                    <strong>Remboursements ou annulations des services</strong><br>
                                    - Les services seront remboursés en cas d’annulation au moins 48 heures avant la réservation du service.<br><br>

                                    <strong>Retours</strong><br>
                                    Les retours peuvent être effectués en personne aux endroits suivants : Notre magasin de vente<br><br>
                                    Veuillez suivre cette procédure pour retourner vos articles par la poste :<br>
                                    Appeler directement au centre de services.<br>
                                    450-504-6011<br><br>

                                    <strong>Garanties</strong><br>
                                    1. Tout les garantie du manufacturier sont applicable sur les produits vendu par Plancher Laurentides Inc.<br><br>
                                    Limitation de responsabilité<br>
                                    Plancher Laurentides INC ou l’un de ses employés sera tenu responsable de tout problème découlant de ce site. 
                                    Néanmoins, Plancher Laurentides INC et ses employés ne seront pas tenus responsables de tout problème découlant de toute utilisation irrégulière de ce site.<br><br>


                                    <strong>Indemnité</strong><br>
                                    En tant qu’utilisateur, vous indemnisez par les présentes Plancher Laurentides INC de toute responsabilité, de tout coût, de toute cause d’action, de tout dommage ou de toute dépense découlant de votre utilisation de ce site ou de votre violation de l’une des dispositions énoncées dans le présent document.<br><br>

                                    <strong>Lois applicables</strong><br>
                                    Ce document est soumis aux lois applicables du Canada et vise à se conformer à ses règles et règlements nécessaires.<br><br>
                                    Pour les résidents de l’UE, le RGPD est la loi applicable qui régit ce document. En cas d’incompatibilité entre une disposition du présent document et le RGPD, les règles du RGPD auront préséance.<br><br>

                                    <strong>Divisibilité</strong><br>
                                    Si, à tout moment, l’une des dispositions énoncées dans le présent document est jugée incompatible ou invalide en vertu des lois applicables, ces dispositions seront considérées comme nulles et seront retirées du présent document. Toutes les autres dispositions ne seront pas touchées par les lois et le reste du document sera toujours considéré comme valide.<br><br>

                                    <strong>Modifications</strong><br>
                                    Ces conditions générales peuvent être modifiées de temps à autre afin de maintenir le respect de la loi et de refléter tout changement à la façon dont nous gérons notre site et la façon dont nous nous attendons à ce que les utilisateurs se comportent sur notre site. 
                                    Nous recommandons à nos utilisateurs de vérifier ces conditions générales de temps à autre pour s’assurer qu’ils sont informés de toute mise à jour. Au besoin, nous informerons les utilisateurs par courriel des changements apportés à ces conditions ou nous afficherons un avis sur notre site.<br><br>

                                    <strong>Contact</strong><br>
                                    Veuillez communiquer avec nous si vous avez des questions ou des préoccupations. Nos coordonnées sont les suivantes ::<br><br>
                                    D.fradet@plancherlaurentides.com<br>
                                    2200 boulvard Ste-Sophie, Ste-Sophie, QC J5J2P5<br><br>
                                    Date d’entrée en vigueur : le 30 janvier 2021<br>
                                    ©2002-2021 LawDepot.ca®
                                   </li><br><br>
                            </ol>
                            <h4>MODE D'EXPÉDITION</h4>
                            <br>
                            <ol start="7">
                                <li>La méthode de livraison a été sélectionnée pour donner une livraison rapide et sûre. Nous utilisons généralement des transporteurs qui vous livrent à domicile.</li><br><br>
                            </ol>
                            <h4>FRAIS DE LIVRAISON</h4>
                            <br>
                            <ol start="8">
                                <li>Les frais de livraison couvrent les frais de préparation et d’emballage, plus l’affranchissement. En aucun cas un client ne pourra combiner plusieurs commandes pour bénéficier d’une réduction des frais de port. 
                                    Des frais minimum de 90$ seront exigé pour les commandes de moins de 2000 $. Des frais de transport peuvent s’appliquer dans les région éloigné. Des frais de transport pour les produits ménagé sont différent et établis selon les prix de transport avec poste canada. </li><br><br>
                            </ol>
                            <h4>DÉLAIS DE LIVRAISON</h4>
                            <br>
                            <ol start="9">
                                <li>Un délai de deux jours ouvrables doit être alloué au traitement des commandes pour les produits en stock à notre boutique, auquel il faut ajouter un à trois jours ouvrables en moyenne pour une livraison au Québec et un à cinq jours ouvrables pour l’Ontario. 
                                    Plancher Laurentides boutique en ligne ne pourra en aucun cas être tenue responsable d’un retard de livraison résultant d’une rupture de stock chez le distributeur ou attribuable au transporteur. 
                                    Veillez communiquer avec nous par émail ou téléphone pour une commande avec livraison accélérée. Plancher Laurentides boutique en ligne ne pourra en aucun cas être tenue responsable d’un retard de livraison pour le temps des fêtes à partir du 17 décembre de chaque année.</li><br><br>
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">Catégories</h5>
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