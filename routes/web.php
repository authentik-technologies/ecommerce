<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\BannersController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\FaqController;

use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\ContactUsController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\UserDashboardController;

use App\http\Middleware\RedirectIfAuthenticated;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// SHOP INDEX/HOME ROOT PAGE
Route::get('/', function() {
    return view('shop.index');
});

Route::get('/facture', function() {
    return view('shop.mail.order');
});


// SHOP FRONTEND
Route::get('/a-propos', function() {
    return view('shop.about-us');
});

// CONTACT US ROUTES
Route::get('/contactez-nous', [ContactUsController::class, 'ContactForm']);
Route::post('/contactez-nous/confirmation', [ContactUsController::class, 'ContactFormPost'])->name('contact.save');



Route::get('/faq', function() {
    return view('shop.faq');
});

Route::get('/politiques', function() {
    return view('shop.policies');
});

Route::post('/politiques', function() {
    return view('shop.policies');
});



// PRODUCT DETAILS ROUTE
Route::controller(ShopController::class)->group(function(){

Route::get('/boutique', 'Index');
Route::get('/produits/details/{id}/{slug}' ,  'ProductDetails');
Route::get('/produits/categories/{id}/{slug}' ,'CategoryDetails');
Route::get('/produits/marques/{id}/{slug}' , 'BrandDetails');

Route::post('/search' , 'Search')->name('shop.search');

});



// PRODUCT MINI CART VIEW ROUTE
Route::get('/produits/details/minicart' , [CartController::class, 'MiniCart']);
// PRODUCT ADD TO CART ROUTE
Route::post('/produits/details/add/{id}' , [CartController::class, 'AddToCart']);
// PRODUCT REMOVE FROM CART ROUTE
Route::post('/produits/details/minicart/remove/{rowId}' , [CartController::class, 'RemoveMiniCart']);




 // CART CONTROLLER GROUP
 Route::controller(CartController::class)->group(function(){
    
    // PRODUCT CART PAGE
    Route::get('/panier', 'AllCart')->name('shop.cart');
    Route::get('/produits/details/panier', 'GetCart');
    Route::post('/produits/details/remove/{rowid}', 'RemoveCart');
    Route::get('/increment/{rowId}', 'CartIncrement');
    Route::get('/decrement/{rowId}', 'CartDecrement');

});


// USER DASHBOARD MIDDLEWARE FUNCTION //
Route::middleware(['auth', 'role:user'])->group(function(){

    // USER DASHBOARD CONTROLLER GROUP
    Route::controller(UserController::class)->group(function(){
        // USER DASHBOARD ROUTES
        Route::get('/dashboard', 'UserDashboard')->name('shop.account.dashboard');
        Route::post('/dashboard/profile/save', 'UserProfileSave')->name('user.profile.save');
        Route::post('/dashboard/profile/password/save', 'UserPasswordSave')->name('user.password.save');
        Route::post('/dashboard/profile/shipping/update', 'UserShippingUpdate')->name('user.shipping.update');
        Route::post('/dashboard/profile/billing/update', 'UserBillingUpdate')->name('user.billing.update');

        Route::get('/dashboard/logout', 'UserLogout')->name('shop.account.logout');

    });

    // USER DASHBOARD CONTROLLER GROUP
    Route::controller(UserDashboardController::class)->group(function(){
        // USER DASHBOARD ROUTES
        Route::get('/dashboard/account/details', 'UserAccount')->name('shop.account.details');
        Route::get('/dashboard/account/address', 'UserAddress')->name('shop.account.address');
        Route::get('/dashboard/account/orders', 'UserOrders')->name('shop.account.orders');
        Route::get('/dashboard/account/orders/details/{order_id}', 'UserOrdersDetails');
        Route::get('/dashboard/account/orders/download/{order_id}', 'UserOrdersInvoice');
        Route::get('/dashboard/account/password', 'UserPassword')->name('shop.account.password');
        Route::get('/dashboard/account/tracking', 'UserTracking')->name('shop.account.tracking');

    });

    // WISHLIST CONTROLLER GROUP
    Route::controller(WishlistController::class)->group(function(){
        // PRODUCT ADD TO WISHLISt
        Route::get('/favoris', 'AllWishlist')->name('shop.wishlist');
        Route::get('/get-wishlist-products', 'GetWishlist');
        Route::get('/remove-wishlist-products/{id}', 'RemoveWishlist');

});

    // COMPARE CONTROLLER GROUP
    Route::controller(CompareController::class)->group(function(){
        // PRODUCT ADD TO COMPARE LIST
        Route::get('/comparaison', 'AllCompare')->name('shop.compare');
        Route::get('/get-compare-products', 'GetCompare');
        Route::get('/remove-compare-products/{id}', 'RemoveCompare');

});

// PRODUCT ADD TO WISHLIST ROUTE
Route::post('/ajouter-aux-favoris/{product_id}' , [WishlistController::class, 'AddToWishlist']);
// PRODUCT ADD TO COMPARE ROUTE
Route::post('/ajouter-pour-comparaison/{product_id}' , [CompareController::class, 'AddToCompare']);

// CHECKOUT CONTROLLER GROUP
Route::controller(StripeController::class)->group(function(){

    // CHECKOUT FUNCTIONS
    route::post('/paiement/secure', 'StripePayment')->name('shop.stripe');

});

    
});

// CHECKOUT CONTROLLER GROUP
Route::controller(CheckoutController::class)->group(function(){

    // CHECKOUT FUNCTIONS
    route::get('/commander', 'Checkout')->name('shop.checkout');
    Route::post('/commander/save', 'CheckoutSave')->name('checkout.save');
    

});




// ADMIN DASHBOARD //

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->
    name('admin.dashboard');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->
    name('admin.profile');

    Route::post('/admin/profile', [AdminController::class, 'AdminProfileSave'])->
    name('admin.profile.save');

    Route::get('/admin/profile/password', [AdminController::class, 'AdminProfilePassword'])->
    name('admin.profile.password');

    Route::post('/admin/profile/password', [AdminController::class, 'AdminProfilePasswordUpdate'])->
    name('admin.profile.password.update');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->
    name('admin.logout');
});


// BACKEND FUNCTIONS //
Route::middleware(['auth','role:admin'])->group(function() {

    Route::controller(ProductsController::class)->group(function(){

        // PRODUCTS ROUTES
        Route::get('/admin/products' , 'AllProducts')->name('admin.products.index');
        Route::get('/admin/products/add' , 'AddProducts')->name('admin.products.add');
        Route::post('/admin/products/save' , 'SaveProducts')->name('admin.products.save');
        Route::get('/admin/products/edit/{id}' , 'EditProducts')->name('admin.products.edit');
        Route::post('/admin/products/update' , 'UpdateProducts')->name('admin.products.update');
        Route::get('/admin/products/delete/{id}' , 'DeleteProducts')->name('admin.products.delete');
        Route::post('/admin/products/update/thumbnail' , 'UpdateProductsThumbnail')->name('admin.products.update.thumbnail');
        Route::post('/admin/products/update/thumbnails' , 'UpdateProductsThumbnails')->name('admin.products.update.thumbnails');
        Route::post('/admin/products/add/thumbnails' , 'AddThumbnails')->name('admin.products.add.thumbnails');
        Route::get('/admin/products/delete/thumbnails/{id}' , 'DeleteProductsThumbnails')->name('admin.products.delete.thumbnails');


        Route::get('/admin/products/active/{id}' , 'ActiveProducts')->name('admin.products.active');
        Route::get('/admin/products/inactive/{id}' , 'InactiveProducts')->name('admin.products.inactive');
        
    });

    // BRAND ROUTES

    Route::controller(BrandsController::class)->group(function(){
     
        Route::get('/admin/brands' , 'AllBrands')->name('admin.brands.index');
        Route::get('/admin/brands/add' , 'AddBrands')->name('admin.brands.add');
        Route::post('/admin/brands/save' , 'SaveBrands')->name('admin.brands.save');
        Route::get('/admin/brands/edit/{id}' , 'EditBrands')->name('admin.brands.edit');
        Route::post('/admin/brands/update' , 'UpdateBrands')->name('admin.brands.update');
        Route::get('/admin/brands/delete/{id}' , 'DeleteBrands')->name('admin.brands.delete');
        
    });


    Route::controller(CategoriesController::class)->group(function(){

        // CATEGORIES ROUTES
        Route::get('/admin/categories' , 'AllCategories')->name('admin.categories.index');
        Route::get('/admin/categories/add' , 'AddCategories')->name('admin.categories.add');
        Route::post('/admin/categories/save' , 'SaveCategories')->name('admin.categories.save');
        Route::get('/admin/categories/edit/{id}' , 'EditCategories')->name('admin.categories.edit');
        Route::post('/admin/categories/update' , 'UpdateCategories')->name('admin.categories.update');
        Route::get('/admin/categories/delete/{id}' , 'DeleteCategories')->name('admin.categories.delete');
        
    });

    Route::controller(SubCategoriesController::class)->group(function(){

        // SUB-CATEGORIES ROUTES
        Route::get('/admin/subcategories' , 'AllSubCategories')->name('admin.subcategories.index');
        Route::get('/admin/subcategories/add' , 'AddSubCategories')->name('admin.subcategories.add');
        Route::post('/admin/subcategories/save' , 'SaveSubCategories')->name('admin.subcategories.save');
        Route::get('/admin/subcategories/edit/{id}' , 'EditSubCategories')->name('admin.subcategories.edit');
        Route::post('/admin/subcategories/update' , 'UpdateSubCategories')->name('admin.subcategories.update');
        Route::get('/admin/subcategories/delete/{id}' , 'DeleteSubCategories')->name('admin.subcategories.delete');
        Route::get('/admin/subcategories/ajax/{category_id}' , 'GetSubCategories');
        
    });

    // BACKEND SLIDER FUNCTIONS //
    Route::controller(SlidersController::class)->group(function() {

        // SLIDER ROUTES
        Route::get('/admin/sliders' , 'AllSliders')->name('admin.sliders.index');
        Route::get('/admin/sliders/add' , 'AddSliders')->name('admin.sliders.add');
        Route::post('/admin/sliders/save' , 'SaveSliders')->name('admin.sliders.save');
        Route::get('/admin/sliders/edit/{id}' , 'EditSliders')->name('admin.sliders.edit');
        Route::post('/admin/sliders/update' , 'UpdateSliders')->name('admin.sliders.update');
        Route::get('/admin/sliders/delete/{id}' , 'DeleteSliders')->name('admin.sliders.delete');
        
    });

    // BACKEND BANNER FUNCTIONS //
    Route::controller(BannersController::class)->group(function() {

        // BANNER ROUTES
        Route::get('/admin/banners' , 'AllBanners')->name('admin.banners.index');
        Route::get('/admin/banners/add' , 'AddBanners')->name('admin.banners.add');
        Route::post('/admin/banners/save' , 'SaveBanners')->name('admin.banners.save');
        Route::get('/admin/banners/edit/{id}' , 'EditBanners')->name('admin.banners.edit');
        Route::post('/admin/banners/update' , 'UpdateBanners')->name('admin.banners.update');
        Route::get('/admin/banners/delete/{id}' , 'DeleteBanners')->name('admin.banners.delete');
        
    });


    // BACKEND ORDERS MANAGEMENT //
    Route::controller(OrderController::class)->group(function() {

        // ORDER ROUTES
        Route::get('/admin/orders' , 'Pending')->name('admin.orders.pending');
        Route::get('/admin/orders/details/{order_id}' , 'Details')->name('admin.orders.details');
        Route::get('/admin/orders/details/invoice/{order_id}' , 'Invoice')->name('admin.orders.invoice');
        Route::get('/admin/orders/confirm/{order_id}' , 'Confirm')->name('admin.orders.confirm');
        Route::get('/admin/orders/cancel/{order_id}' , 'Cancel')->name('admin.orders.cancel');
        Route::get('/admin/orders/return/{order_id}' , 'Return')->name('admin.orders.return');
        Route::get('/admin/orders/delete/{order_id}' , 'Delete')->name('admin.orders.delete');
        
    });

    // BACKEND ORDERS MANAGEMENT //
    Route::controller(ReportsController::class)->group(function() {

        // ORDER ROUTES
        Route::get('/admin/reports' , 'Index')->name('admin.reports.index');
        Route::post('/admin/reports/date' , 'ByDate')->name('admin.reports.date');
        
    });

    // BACKEND SHIPPING MANAGEMENT //
    Route::controller(ShippingController::class)->group(function() {

        // DIVISION ROUTES
        Route::get('/admin/shipping' , 'AllDivision')->name('admin.shipping.index');
        Route::get('/admin/shipping/add' , 'AddDivision')->name('admin.shipping.add');
        Route::post('/admin/shipping/save' , 'SaveDivision')->name('admin.shipping.save');
        Route::get('/admin/shipping/edit/{id}' , 'EditDivision')->name('admin.shipping.edit');
        Route::post('/admin/shipping/update' , 'UpdateDivision')->name('admin.shipping.update');
        Route::get('/admin/shipping/delete/{id}' , 'DeleteDivision')->name('admin.shipping.delete');

        // DISTRICT ROUTES
        Route::get('/admin/district' , 'AllDistrict')->name('admin.district.index');
        Route::get('/admin/district/add' , 'AddDistrict')->name('admin.district.add');
        Route::post('/admin/district/save' , 'SaveDistrict')->name('admin.district.save');
        Route::get('/admin/district/edit/{id}' , 'EditDistrict')->name('admin.district.edit');
        Route::post('/admin/district/update' , 'UpdateDistrict')->name('admin.district.update');
        Route::get('/admin/district/delete/{id}' , 'DeleteDistrict')->name('admin.district.delete');

        // STATE ROUTES
        Route::get('/admin/state' , 'AllState')->name('admin.state.index');
        Route::get('/admin/state/add' , 'AddState')->name('admin.state.add');
        Route::post('/admin/state/save' , 'SaveState')->name('admin.state.save');
        Route::get('/admin/state/edit/{id}' , 'EditState')->name('admin.state.edit');
        Route::post('/admin/state/update' , 'UpdateState')->name('admin.state.update');
        Route::get('/admin/state/delete/{id}' , 'DeleteState')->name('admin.state.delete');
        
    });

    // BACKEND USERS MANAGEMENT //
    Route::controller(ClientsController::class)->group(function() {

        // USER ROUTES
        Route::get('/admin/users' , 'AllUsers')->name('admin.users.index');
        Route::get('/admin/users/add' , 'AddUsers')->name('admin.users.add');
        Route::post('/admin/users/save' , 'SaveUsers')->name('admin.users.save');
        Route::get('/admin/users/edit/{id}' , 'EditUsers')->name('admin.users.edit');
        Route::post('/admin/users/update' , 'UpdateUsers')->name('admin.users.update');
        Route::get('/admin/users/delete/{id}' , 'DeleteUsers')->name('admin.users.delete');
        
    });

    // BACKEND SETTINGS MANAGEMENT //
    Route::controller(SettingsController::class)->group(function() {

        // SETTING ROUTES
        Route::get('/admin/settings' , 'Index')->name('admin.settings.index');
        Route::get('/admin/settings/site' , 'SiteSettings')->name('admin.settings.site.index');
        Route::post('/admin/settings/site/save' , 'SaveSiteSettings')->name('admin.settings.site.save');

        
    });

    // BACKEND FAQS MANAGEMENT //
    Route::controller(FaqController::class)->group(function() {

        // FAQ ROUTES
        Route::get('/admin/faq' , 'Index')->name('admin.faq.index');
        Route::get('/admin/faq/add' , 'AddFaq')->name('admin.faq.add');
        Route::post('/admin/faq/save' , 'SaveFaq')->name('admin.faq.save');
        Route::get('/admin/faq/edit/{id}' , 'EditFaq')->name('admin.faq.edit');
        Route::post('/admin/faq/update' , 'UpdateFaq')->name('admin.faq.update');
        Route::get('/admin/faq/delete/{id}' , 'DeleteFaq')->name('admin.faq.delete');
        
    });




});




require __DIR__.'/auth.php';




