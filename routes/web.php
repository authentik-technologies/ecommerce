<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\BannersController;

use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;

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


// SHOP FRONTEND
Route::get('/a-propos', function() {
    return view('shop.about-us');
});

Route::get('/contactez-nous', function() {
    return view('shop.contact-us');
});

Route::get('/boutique', function() {
    return view('shop.products.index');
});


// PRODUCT DETAILS ROUTE
Route::get('/produits/details/{id}/{slug}' , [ShopController::class, 'ProductDetails']);
Route::get('/produits/categories/{id}/{slug}' , [ShopController::class, 'CategoryDetails']);

// PRODUCT MINI CART VIEW ROUTE
Route::get('/produits/details/minicart' , [CartController::class, 'MiniCart']);
// PRODUCT ADD TO CART ROUTE
Route::post('/produits/details/add/{id}' , [CartController::class, 'AddToCart']);
// PRODUCT REMOVE FROM CART ROUTE
Route::get('/produits/details/remove/{rowId}' , [CartController::class, 'RemoveMiniCart']);

// PRODUCT ADD TO WISHLIST ROUTE
Route::post('/ajouter-aux-favoris/{product_id}' , [WishlistController::class, 'AddToWishlist']);

// PRODUCT ADD TO COMPARE ROUTE
Route::post('/ajouter-pour-comparaison/{product_id}' , [CompareController::class, 'AddToCompare']);


// USER DASHBOARD MIDDLEWARE FUNCTION //
Route::middleware(['auth', 'role:user'])->group(function(){

    // USER DASHBOARD CONTROLLER GROUP
    Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard', 'UserDashboard')->name('shop.account.dashboard');
    Route::post('/dashboard/profile/save', 'UserProfileSave')->name('user.profile.save');
    Route::post('/dashboard/profile/password/save', 'UserPasswordSave')->name('user.password.save');
    Route::post('/dashboard/profile/shipping/update', 'UserShippingUpdate')->name('user.shipping.update');
    Route::post('/dashboard/profile/billing/update', 'UserBillingUpdate')->name('user.billing.update');

    Route::get('/dashboard/logout', 'UserLogout')->name('shop.account.logout');

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

    // CART CONTROLLER GROUP
    Route::controller(CartController::class)->group(function(){
        // PRODUCT CART PAGE
        Route::get('/panier', 'AllCart')->name('shop.cart');
        Route::get('/produits/details/panier', 'GetCart');
        Route::get('/produits/details/remove/{rowId}', 'RemoveCart');
        
        
    
    });

    
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


// BACKEND PRODUCTS FUNCTIONS //
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

});

// BACKEND BRANDS FUNCTIONS //
Route::middleware(['auth','role:admin'])->group(function() {

    Route::controller(BrandsController::class)->group(function(){

        // BRAND ROUTES
        Route::get('/admin/brands' , 'AllBrands')->name('admin.brands.index');
        Route::get('/admin/brands/add' , 'AddBrands')->name('admin.brands.add');
        Route::post('/admin/brands/save' , 'SaveBrands')->name('admin.brands.save');
        Route::get('/admin/brands/edit/{id}' , 'EditBrands')->name('admin.brands.edit');
        Route::post('/admin/brands/update' , 'UpdateBrands')->name('admin.brands.update');
        Route::get('/admin/brands/delete/{id}' , 'DeleteBrands')->name('admin.brands.delete');
        
    });

});

// BACKEND CATEGORIES FUNCTIONS //
Route::middleware(['auth','role:admin'])->group(function() {

    Route::controller(CategoriesController::class)->group(function(){

        // CATEGORIES ROUTES
        Route::get('/admin/categories' , 'AllCategories')->name('admin.categories.index');
        Route::get('/admin/categories/add' , 'AddCategories')->name('admin.categories.add');
        Route::post('/admin/categories/save' , 'SaveCategories')->name('admin.categories.save');
        Route::get('/admin/categories/edit/{id}' , 'EditCategories')->name('admin.categories.edit');
        Route::post('/admin/categories/update' , 'UpdateCategories')->name('admin.categories.update');
        Route::get('/admin/categories/delete/{id}' , 'DeleteCategories')->name('admin.categories.delete');
        
    });

});

// BACKEND SUB-CATEGORIES FUNCTIONS //
Route::middleware(['auth','role:admin'])->group(function() {

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

require __DIR__.'/auth.php';




