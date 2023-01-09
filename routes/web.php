<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\ProductsController;





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


// SHOP INDEX/HOME ROOT PAGE  //
Route::get('/', function () {
    return view('shop.index');
});

// SHOP FRONTEND  //

Route::get('/a-propos', function () {
    return view('shop.about-us');
});

Route::get('/contactez-nous', function () {
    return view('shop.contact-us');
});

Route::get('/boutique', function () {
    return view('shop.boutique');
});


// ADMIN DASHBOARD //

Route::get('/admin/login', [AdminController::class, 'AdminLogin']);

Route::middleware(['auth','role:admin'])->group(function(){
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
Route::middleware(['auth','role:admin'])->group(function(){

    Route::controller(ProductsController::class)->group(function(){

        // PRODUCTS ROUTES
        Route::get('/admin/products' , 'AllProducts')->name('admin.products.index');
        Route::get('/admin/products/add' , 'AddProducts')->name('admin.products.add');
        Route::post('/admin/products/save' , 'SaveProducts')->name('admin.products.save');
        Route::get('/admin/products/edit/{id}' , 'EditProducts')->name('admin.products.edit');
        Route::post('/admin/products/update' , 'UpdateProducts')->name('admin.products.update');
        Route::get('/admin/products/delete/{id}' , 'DeleteProducts')->name('admin.products.delete');
        
    });

});

// BACKEND BRANDS FUNCTIONS //
Route::middleware(['auth','role:admin'])->group(function(){

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
Route::middleware(['auth','role:admin'])->group(function(){

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
Route::middleware(['auth','role:admin'])->group(function(){

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

// VENDOR DASHBOARD //

Route::middleware(['auth','role:vendor'])->group(function(){
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->
    name('vendor.dashboard');
});


// CLIENT DASHBOARD //

Route::get('/dashboard', function () {
    return view('shop.account.dashboard');
})->middleware(['auth','role:user','verified'])->name('account.dashboard');

Route::middleware('auth','role:user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




