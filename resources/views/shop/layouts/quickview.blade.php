<!--Start Quick view-->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <!-- Start Gallery -->
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src=" " alt="product image" id="pimage" />
                                </figure>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <!-- Start Detail Info -->
                        <div class="detail-info pr-30 pl-30">
                             
                            <span class="stock-status in-stock" id="in-stock"></span>
                            <span class="stock-status out-stock" id="out-stock"></span>
                            
                            <h4 class="title-detail"><a href=" " class="text-heading" id="pname"></a></h4>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="pprice"></span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15" id="pdiscount"></span>
                                        <span class="old-price font-md ml-15" id="oldprice"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="qty" id="qty" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="product_id">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart" onclick="addToCart()"></i>Ajouter au Panier</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <h6 class="mb-5">Fabriqué par: <span class="text-brand" id="pbrand"></span></h6>
                                    <hr>
                                    <li class="mb-5">Categorie: <span class="text-brand" id="pcategory"></span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Quick view-->